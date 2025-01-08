<?php
// <!-- {{-- REVISADO Y COMENTADO --}} -->
namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Intenta autenticar las credenciales de la solicitud.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        // Asegurarse de que la solicitud de inicio de sesión no esté limitada por la tasa
        $this->ensureIsNotRateLimited();

        // Intentar autenticar al usuario con las credenciales proporcionadas
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // Incrementar el contador de intentos fallidos
            RateLimiter::hit($this->throttleKey());

            // Verificar si el usuario existe para proporcionar un mensaje de error más específico
            if (Auth::getProvider()->retrieveByCredentials($this->only('email'))) {
                throw ValidationException::withMessages([
                    'password' => trans('auth.password'),
                ]);
            }

            // Lanzar una excepción de validación si la autenticación falla
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        // Limpiar el contador de intentos fallidos si la autenticación es exitosa
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Asegura que la solicitud de inicio de sesión no esté limitada por la tasa.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        // Verificar si se han realizado demasiados intentos de inicio de sesión
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        // Disparar el evento de bloqueo si se han realizado demasiados intentos
        event(new Lockout($this));

        // Obtener el tiempo restante para el siguiente intento permitido
        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Lanzar una excepción de validación con el mensaje de limitación de tasa
        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Obtiene la clave de limitación de tasa para la solicitud.
     */
    public function throttleKey(): string
    {
        // Generar una clave única para la limitación de tasa basada en el email y la IP del usuario
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}

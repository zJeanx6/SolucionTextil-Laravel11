<?php
// <!-- {{-- REVISADO Y COMENTADO --}} -->
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Muestra la vista para restablecer la contraseña.
     *
     * Este método simplemente devuelve la vista que contiene el formulario
     * de restablecimiento de contraseña, pasando el objeto de solicitud
     * como variable para poder reutilizar los datos de la solicitud.
     *
     * @param Request $request La solicitud HTTP entrante.
     * @return View La vista con el formulario de restablecimiento.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Maneja la solicitud de restablecimiento de contraseña.
     *
     * Este método valida los datos del formulario de restablecimiento
     * y luego intenta restablecer la contraseña del usuario. Si la
     * operación es exitosa, la contraseña se actualiza en la base de datos.
     * Si ocurre un error, se devuelve una respuesta con el mensaje de error.
     *
     * @param Request $request La solicitud HTTP entrante.
     * @return RedirectResponse Redirige al usuario dependiendo del resultado del restablecimiento.
     * @throws \Illuminate\Validation\ValidationException Si los datos no cumplen con las reglas de validación.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validamos los datos del formulario de restablecimiento de contraseña.
        $request->validate([
            'token' => ['required'], 
            'email' => ['required', 'email'], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Intentamos restablecer la contraseña del usuario.
        // Si es exitoso, actualizamos la contraseña en el modelo de usuario
        // y la guardamos en la base de datos. Si falla, mostramos el error.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                // Si la validación fue exitosa, actualizamos la contraseña.
                $user->forceFill([
                    'password' => Hash::make($request->password), // Encriptamos la nueva contraseña.
                    'remember_token' => Str::random(60), // Generamos un nuevo token de "remember me".
                ])->save(); // Guardamos los cambios en el modelo de usuario.

                //lanzamos el evento de restablecimiento de contraseña para notificar al sistema.
                event(new PasswordReset($user));
            }
        );

        // Si el restablecimiento fue exitoso, redirigimos al usuario al login.
        // Si ocurrió un error, redirigimos de nuevo al formulario con el mensaje de error.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status)) // Redirige al login con un mensaje de éxito.
                    : back()->withInput($request->only('email')) // Redirige de vuelta al formulario con los datos ingresados.
                        ->withErrors(['email' => __($status)]); // Muestra los errores de la operación de restablecimiento.
    }
}

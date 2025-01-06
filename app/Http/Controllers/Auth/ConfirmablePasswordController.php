<?php
// <!-- {{-- REVISADO Y COMENTADO --}} -->
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Muestra la vista de confirmación de contraseña.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirma la contraseña del usuario.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar la contraseña del usuario
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Almacenar el tiempo de confirmación de la contraseña en la sesión
        $request->session()->put('auth.password_confirmed_at', time());

        // Redirigir al usuario a la ruta deseada
        return redirect()->intended(route('dashboard', absolute: false));
    }
}

<?php
// <!-- {{-- REVISADO Y COMENTADO --}} -->
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Muestra la vista de inicio de sesión.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Maneja una solicitud de autenticación entrante.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autenticar al usuario
        $request->authenticate();

        // Regenerar la sesión para mayor seguridad
        $request->session()->regenerate();

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario tiene un rol asignado
        if (!$user->rol) {
            // Si no tiene rol, redirige a la página de inicio
            return redirect('/');
        }

        // Verificar el rol del usuario y redirigir a la vista correspondiente
        if ($user->rol->nombre === 'admin') {
            return redirect()->route('dashboard');
        }

        if ($user->rol->nombre === 'mantenimiento') {
            return redirect()->route('mantenimiento');
        }

        // Si no es ninguno de los roles anteriores, redirigir a alguna ruta predeterminada
        return redirect('/');
    }

    /**
     * Destruye una sesión autenticada.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Cerrar la sesión del usuario
        Auth::guard('web')->logout();

        // Invalidar la sesión actual
        $request->session()->invalidate();

        // Regenerar el token de la sesión
        $request->session()->regenerateToken();

        // Redirigir a la página de inicio
        return redirect('/');
    }
}

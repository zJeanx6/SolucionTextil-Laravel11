<?php

// app/Http/Controllers/Auth/AuthenticatedSessionController.php

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
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autenticar al usuario
        $request->authenticate();

        // Regenerar la sesión para mayor seguridad
        $request->session()->regenerate();

        // Obtener el usuario autenticado, incluyendo la relación con el rol
        $user = Auth::user();  // No es necesario el 'load', ya que Laravel carga las relaciones definidas

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
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

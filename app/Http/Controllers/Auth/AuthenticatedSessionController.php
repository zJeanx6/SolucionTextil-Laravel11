<?php

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
    
        // Obtener el usuario autenticado
        $user = Auth::user();
    
        // Verificar el rol del usuario y redirigir según corresponda
        if ($user->rolId === 1) {
            // Si el rol del usuario es 'admin' (suponiendo que '1' es el ID del rol 'admin')
            return redirect()->route('dashboard');  // Redirige al dashboard del admin
        }
    
        // Si el usuario tiene un rol diferente (por ejemplo, 'usuario' u otro rol)
        return redirect()->route('dashboard');  // Redirige al dashboard del usuario normal
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

<?php
// <!-- {{-- REVISADO Y COMENTADO --}} -->
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles  Roles permitidos para acceder a la ruta
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Obtenemos el usuario autenticado
        $user = Auth::user();

        // Verificamos si el usuario tiene uno de los roles permitidos
        if (!$user || !in_array($user->rol->nombre, $roles)) {
            // Si el usuario no tiene el rol adecuado, redirigir a la página de error de acceso denegado
            return redirect()->route('access-denied');
        }

        // Si tiene el rol, continuar con la solicitud
        return $next($request);
    }
}

<?php
// <!-- {{-- REVISADO Y COMENTADO --}} -->
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RoleRedirectController extends Controller
{
    /**
     * Mostrar el dashboard para administradores.
     */
    public function admin()
    {
        return view('admin.dashboard');
    }

    /**
     * Mostrar la lista de usuarios con sus roles.
     */
    public function usuarios()
    {
        $usuarios = User::with('rol')->get(); // Obtener todos los usuarios con sus roles
        return view('admin.usuario.verUsuarios', compact('usuarios'));
    }

    /**
     * Mostrar la vista para mantenimiento.
     */
    public function mantenimiento()
    {
        return view('mantenimiento.dashboard');
    }
}

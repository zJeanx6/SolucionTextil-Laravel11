<?php

// app/Http/Controllers/RoleRedirectController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RoleRedirectController extends Controller
{
    /**
     * Mostrar el dashboard para administradores
     */
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function usuarios()
    {
        $usuarios = User::with('rol')->get(); // Obtener todos los usuarios con sus roles
        return view('admin.verUsuarios', compact('usuarios'));
    }

    /**
     * Mostrar la vista para mantenimiento
     */
    public function mantenimiento()
    {
        return view('mantenimiento.dashboard');
    }

}

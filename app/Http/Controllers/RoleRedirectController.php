<?php
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
     * Mostrar la vista para mantenimiento.
     */
    public function mantenimiento()
    {
        return view('mantenimiento.dashboard');
    }
}

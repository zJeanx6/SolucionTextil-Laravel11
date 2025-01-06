<?php
// <!-- {{-- REVISADO Y COMENTADO --}} -->
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Mostrar la página de inicio.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Mostrar la página sobre nosotros.
     */
    public function sobreNosotros()
    {
        return view('sobreNosotros');
    }

    /**
     * Mostrar la página de inicio de sesión.
     */
    public function login()
    {
        return view('auth.login');
    }
}

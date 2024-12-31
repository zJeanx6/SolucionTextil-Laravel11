<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // Aquí puedes agregar lógica si es necesario
        return view('index'); // Retorna la vista index.blade.php
    }

    public function sobreNosotros()
    {
        // Otra vista que puedas necesitar
        return view('sobreNosotros');
    }

    public function login()
    {
        return view('auth.login');
    }
}

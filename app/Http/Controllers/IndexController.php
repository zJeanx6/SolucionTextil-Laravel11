<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sobreNosotros()
    {
        return view('sobreNosotros');
    }

    public function login()
    {
        return view('auth.login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Rol;

class UsuarioController extends Controller
{
    public function create()
    {
        // Recuperar todos los roles de la base de datos
        $roles = \App\Models\Rol::all();  // Asumiendo que tienes un modelo Role
    
        // Pasar los roles a la vista
        return view('admin.crearUsuarios', compact('roles'));
    }
    

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'contacto' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'rolId' => 'required|exists:roles,id',
            'estadoId' => 'nullable|exists:estados,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear un nuevo usuario
        $usuario = new User();
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->contacto = $request->input('contacto');
        $usuario->password = Hash::make($request->input('password'));  // Cifrado de la contraseña
        $usuario->rolId = $request->input('rolId');
        $usuario->estadoId = $request->input('estadoId') ?? 1;  // Estado por defecto 'activo'
        $usuario->save();

        return redirect()->route('admin.crearUsuarios')->with('success', 'Usuario creado correctamente.');
    }
}

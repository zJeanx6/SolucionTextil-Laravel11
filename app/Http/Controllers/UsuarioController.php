<?php
namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Rol;
use App\Models\Estado;

class UsuarioController extends Controller
{
    /**
     * Mostrar el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        // Recuperar todos los roles de la base de datos
        $roles = Rol::all();  // Asumiendo que tienes un modelo Rol
    
        // Pasar los roles a la vista
        return view('admin.usuario.verUsuarios', compact('roles'));
    }
    
    /**
     * Almacenar un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:20|unique:usuarios,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'contacto' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'rolId' => 'required|exists:roles,id',
            'estadoId' => 'nullable|exists:estados,id'
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->route('ver-usuarios')->withErrors($validator)->withInput();
        }

        // Crear un nuevo usuario
        $usuario = new User();
        $usuario->id = $request->input('id');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->contacto = $request->input('contacto');
        $usuario->password = Hash::make($request->input('password'));  // Cifrado de la contraseña
        $usuario->rolId = $request->input('rolId');
        $usuario->estadoId = $request->input('estadoId') ?? 2;  // Estado por defecto 'activo'
        $usuario->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-usuarios')->with('create_success', 'Usuario creado correctamente.');
    }

    /**
     * Mostrar la lista de usuarios.
     */
    public function index()
    {
        $usuarios = User::with('rol', 'estado')->get(); // Obtener todos los usuarios con sus roles y estados
        $roles = Rol::all(); // Obtener todos los roles
        $estados = Estado::all(); // Obtener todos los estados
        return view('admin.usuario.verUsuarios', compact('usuarios', 'roles', 'estados'));
    }

    /**
     * Mostrar el formulario para editar un usuario existente.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Rol::all();  // Asumiendo que tienes un modelo Rol

        return view('admin.usuario.editarUsuario', compact('usuario', 'roles'));
    }

    /**
     * Actualizar un usuario existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:20|unique:usuarios,id,' . $id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'contacto' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
            'rolId' => 'required|exists:roles,id',
            'estadoId' => 'nullable|exists:estados,id'
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buscar el usuario existente
        $usuario = User::findOrFail($id);
        $usuario->id = $request->input('id');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');
        $usuario->contacto = $request->input('contacto');
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->input('password'));  // Cifrado de la contraseña
        }
        $usuario->rolId = $request->input('rolId');
        $usuario->estadoId = $request->input('estadoId') ?? $usuario->estadoId;
        $usuario->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-usuarios')->with('update_success', 'Usuario actualizado correctamente.');
    }

    /**
     * Eliminar un usuario existente de la base de datos.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-usuarios')->with('delete_success', 'Usuario eliminado correctamente.');
    }
}

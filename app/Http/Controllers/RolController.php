<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use Illuminate\Support\Facades\Validator;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::all();
        return view('admin.rol.verRoles', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:roles,nombre',
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->route('ver-roles')->withErrors($validator)->withInput();
        }

        // Crear un nuevo rol
        $rol = new Rol();
        $rol->nombre = $request->input('nombre');
        $rol->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-roles')->with('success', 'Rol creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        return view('admin.rol.editarRoles', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:roles,nombre,' . $id,
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buscar el rol existente
        $rol = Rol::findOrFail($id);
        $rol->nombre = $request->input('nombre');
        $rol->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-roles')->with('update_success', 'Rol actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-roles')->with('delete_success', 'Rol eliminado correctamente.');
    }
}

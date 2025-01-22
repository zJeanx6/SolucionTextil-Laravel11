<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use Illuminate\Support\Facades\Validator;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = Estado::all();
        return view('admin.estado.verEstados', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:estados,nombre',
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->route('ver-estados')->withErrors($validator)->withInput();
        }

        // Crear un nuevo estado
        $estado = new Estado();
        $estado->nombre = $request->input('nombre');
        $estado->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-estados')->with('success', 'Estado creado correctamente.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:estados,nombre,' . $id,
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buscar el estado existente
        $estado = Estado::findOrFail($id);
        $estado->nombre = $request->input('nombre');
        $estado->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-estados')->with('success', 'Estado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);
        $estado->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-estados')->with('success', 'Estado eliminado correctamente.');
    }
}

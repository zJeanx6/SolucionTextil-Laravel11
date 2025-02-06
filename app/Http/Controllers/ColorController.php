<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colores = Color::all();
        return view('admin.color.verColores', compact('colores'));
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
            'nombre' => 'required|string|max:255|unique:colores,nombre',
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->route('ver-colores')->withErrors($validator)->withInput();
        }

        // Crear un nuevo color
        $color = new Color();
        $color->nombre = $request->input('nombre');
        $color->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-colores')->with('success', 'Color creado correctamente.');
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
            'nombre' => 'required|string|max:255|unique:colores,nombre,' . $id,
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buscar el color existente
        $color = Color::findOrFail($id);
        $color->nombre = $request->input('nombre');
        $color->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-colores')->with('success', 'Color actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-colores')->with('success', 'Color eliminado correctamente.');
    }
}

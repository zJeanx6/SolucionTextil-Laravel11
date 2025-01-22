<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Illuminate\Support\Facades\Validator;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('admin.marca.verMarcas', compact('marcas'));
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
            'nombre' => 'required|string|max:255|unique:marcas,nombre',
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->route('ver-marcas')->withErrors($validator)->withInput();
        }

        // Crear una nueva marca
        $marca = new Marca();
        $marca->nombre = $request->input('nombre');
        $marca->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-marcas')->with('success', 'Marca creada correctamente.');
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
            'nombre' => 'required|string|max:255|unique:marcas,nombre,' . $id,
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buscar la marca existente
        $marca = Marca::findOrFail($id);
        $marca->nombre = $request->input('nombre');
        $marca->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-marcas')->with('success', 'Marca actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-marcas')->with('success', 'Marca eliminada correctamente.');
    }
}

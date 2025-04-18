<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talla;
use Illuminate\Support\Facades\Validator;

class TallaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tallas = Talla::all();
        return view('admin.talla.verTallas', compact('tallas'));
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
            'letra' => 'required|string|max:255|unique:tallas,letra',
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->route('ver-tallas')->withErrors($validator)->withInput();
        }

        // Crear una nueva talla
        $talla = new Talla();
        $talla->letra = $request->input('letra');
        $talla->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-tallas')->with('success', 'Talla creada correctamente.');
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
            'letra' => 'required|string|max:255|unique:tallas,letra,' . $id,
        ]);

        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buscar la talla existente
        $talla = Talla::findOrFail($id);
        $talla->letra = $request->input('letra');
        $talla->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-tallas')->with('success', 'Talla actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $talla = Talla::findOrFail($id);
        $talla->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('ver-tallas')->with('success', 'Talla eliminada correctamente.');
    }
}

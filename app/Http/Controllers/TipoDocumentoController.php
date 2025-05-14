<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;

class TipoDocumentoController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipodocumentos = TipoDocumento::all();
        return view('tipodocumentos.index', compact('tipodocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('tipodocumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'abreviatura' => 'required|string|max:10',
        ]);
        TipoDocumento::create([
            'nombre' => $request->nombre,
            'abreviatura' => $request->abreviatura,
        ]);
        return redirect()->route('tipodocumentos.index')->with('success', 'Tipo de documento creado correctamente.');    
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documento = TipoDocumento::find($id);

        if (!$documento) {
            return redirect()->route('tipodocumentos.index')->with('error', 'Tipo de documento no encontrado.');
        }
    
        $documento->delete();
    
        return redirect()->route('tipodocumentos.index')->with('success', 'Tipo de documento eliminado correctamente.');
    }
}

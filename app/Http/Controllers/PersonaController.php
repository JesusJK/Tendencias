<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use App\Models\Persona;
use Illuminate\Support\Facades\Storage;

class PersonaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $personas = Persona::with('tipoDocumento')->get();
        return view('personas.index', compact('personas')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TipoDocumento::all();
        return view('personas.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:personas,correo',
            'telefono' => 'required|regex:/^[0-9]+$/|digits_between:7,15',
            'n_documento' => 'required|regex:/^[0-9]+$/|min:5|max:20|unique:personas,n_documento',
            'tipo_documento_id' => 'required|exists:tipo_documento,id',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $ruta = $request->file('foto')->store('fotos', 'public');
        }
        Persona::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'n_documento' => $request->n_documento,
            'tipo_documento_id' => $request->tipo_documento_id,
            'foto' => $ruta ?? null,
        ]);
        return redirect()->route('personas.index')->with('success', 'Persona creada con exito');
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
        $persona = Persona::find($id);

        if (!$persona) {
            return redirect()->route('personas.index')->with('error', 'Persona no encontrada.');
        }
    
        if ($persona->foto) {
            Storage::disk('public')->delete($persona->foto);
        }
        $persona->delete();
    
        return redirect()->route('personas.index')->with('success', 'Persona eliminada correctamente');
        
    }
}

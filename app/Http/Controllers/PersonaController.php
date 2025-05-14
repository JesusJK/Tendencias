<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\TipoDocumento;
use App\Models\Prestamo;

class PersonaController extends Controller
{
    
    public function index()
    {
        
        $personas = Persona::with('tipoDocumento')->get();

        return view('personas.index', compact('personas'));
    }

    
    public function create()
    {
        
        $tiposDocumento = TipoDocumento::all();

        return view('personas.create', compact('tiposDocumento'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'N_documento' => 'required|numeric|unique:personas,N_documento',
            'correo' => 'required|email|max:255|unique:personas,correo',
            'telefono' => 'nullable|string|max:15',
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
        ]);

        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->N_documento = $request->N_documento;
        $persona->correo = $request->correo;
        $persona->telefono = $request->telefono;
        $persona->tipo_documento_id = $request->tipo_documento_id;
        $persona->save();

        return redirect()->route('personas.index')->with('success', 'Persona creada con exito');
    }

    
    public function show($id)
    {
        $persona = Persona::with(['tipoDocumento', 'prestamos'])->findOrFail($id);

        return view('personas.show', compact('persona'));
    }

    
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        $tiposDocumento = TipoDocumento::all();

        return view('personas.edit', compact('persona', 'tiposDocumento'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'N_documento' => 'required|numeric|unique:personas,N_documento,' . $id,
            'correo' => 'required|email|max:255|unique:personas,correo,' . $id,
            'telefono' => 'nullable|string|max:15',
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
        ]);

        $persona = Persona::findOrFail($id);
        $persona->nombre = $request->nombre;
        $persona->N_documento = $request->N_documento;
        $persona->correo = $request->correo;
        $persona->telefono = $request->telefono;
        $persona->tipo_documento_id = $request->tipo_documento_id;
        $persona->save();

        return redirect()->route('personas.index')->with('success', 'Persona actualizada con exito');
    }

   
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada con exito');
    }
}


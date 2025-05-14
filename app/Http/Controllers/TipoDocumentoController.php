<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use App\Models\Persona;

class TipoDocumentoController extends Controller
{
    
    public function index()
    {
        // Obtener todos los tipos de documento
        $tiposDocumento = TipoDocumento::all();

        return view('tipodocumentos.index', compact('tiposDocumento'));
    }

   
    public function create()
    {
        return view('tipodocumentos.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipo_documentos,nombre',
            'abreviatura' => 'required|string|max:10|unique:tipo_documentos,abreviatura',
        ]);

        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->nombre = $request->nombre;
        $tipoDocumento->abreviatura = $request->abreviatura;
        $tipoDocumento->save();

        return redirect()->route('tipodocumentos.index')->with('success', 'Tipo de documento creado con exito');
    }

   
    public function show($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipodocumentos.show', compact('tipoDocumento'));
    }

    public function edit($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        return view('tipodocumentos.edit', compact('tipoDocumento'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipo_documentos,nombre,' . $id,
            'abreviatura' => 'required|string|max:10|unique:tipo_documentos,abreviatura,' . $id,
        ]);

        $tipoDocumento = TipoDocumento::findOrFail($id);
        $tipoDocumento->nombre = $request->nombre;
        $tipoDocumento->abreviatura = $request->abreviatura;
        $tipoDocumento->save();

        return redirect()->route('tipodocumentos.index')->with('success', 'Tipo de documento actualizado con exito');
    }

   
    public function destroy($id)
    {
        $tipoDocumento = TipoDocumento::findOrFail($id);

        // Verificar si hay personas asociadas
        $personasAsociadas = Persona::where('tipo_documento_id', $id)->count();
        if ($personasAsociadas > 0) {
            return redirect()->route('tipodocumentos.index')->with('error', 'No se puede eliminar el tipo de documento porque tiene personas asociadas');
        }

        $tipoDocumento->delete();

        return redirect()->route('tipodocumentos.index')->with('success', 'Tipo de documento eliminado con exito');
    }
}

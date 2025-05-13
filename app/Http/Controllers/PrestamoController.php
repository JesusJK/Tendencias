<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Persona;
use App\Models\Material;

class PrestamoController extends Controller
{
    
    public function index()
    {
        $prestamos = Prestamo::with('persona', 'material')->get(); // Incluye relaciones
        return view('prestamos.index', compact('prestamos'));
    }

   
    public function create()
    {
        $personas = Persona::all();
        $materiales = Material::all();
        return view('prestamos.create', compact('personas', 'materiales'));
    }


    public function store(Request $request)
    {
        try {
            $prestamo->fecha_prestamo=$request->fecha_prestamo;
            $prestamo->estado=$request->estado;

        } catch () {
            //throw $th;
        }

    }

    


    public function show(string $id)
    {
        $prestamo = Prestamo::with('persona', 'material')->findOrFail($id);
        return view('prestamos.show', compact('prestamo'));
    }

    


    public function edit(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $personas = Persona::all();
        $materiales = Material::all();
        return view('prestamos.edit', compact('prestamo', 'personas', 'materiales'));
    }

    



    public function update(Request $request, string $id)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'material_id' => 'required|exists:materials,id',
            'fecha_prestamo' => 'required|date',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());

        return redirect()->route('prestamos.index')->with('success', 'Prestamo actualizado con exito');
    }



    public function destroy(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Prestamo eliminado con exito');
    }



    public function cambioEstadoPrestamos(Request $request)
{
    // Validar que los datos requeridos están presentes
    $request->validate([
        'id' => 'required|exists:prestamos,id',
        'estado' => 'required|string|in:activo,devuelto,retrasado', // Opciones válidas
    ]);

    // Buscar el préstamo por su ID
    $prestamo = Prestamo::findOrFail($request->id);

    // Cambiar el estado del préstamo
    $prestamo->estado = $request->estado;
    $prestamo->save();

    // Respuesta exitosa
    return response()->json([
        'message' => 'El estado del prestamo ha sido actualizado con exito.',
        'prestamo' => $prestamo,
    ], 200);
}

}

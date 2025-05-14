<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Persona;
use App\Models\Material;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    
    public function index()
    {
        $prestamos = Prestamo::with('persona')->get();
        return view('prestamos.index', compact('prestamos'));
    }

   
    public function create()
    {
        $personas = Persona::all();
        return view('prestamos.create', compact('personas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'fecha_prestamo' => 'required|date',
            'material' => 'required|string|max:255',
        ]);
        $fechaDevolucion = Carbon::parse($request->fecha_prestamo)->addDays(7);
        Prestamo::create([
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $fechaDevolucion,
            'estado' => $request->estado,
            'persona_id' => $request->persona_id,
            'material' => $request->material,
            'fecha_entrega' => $request->fecha_entrega,
            'dias_retraso' => 0,
            'registradopor' => auth()->id(),
        ]);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado con éxito');
    }

    


    public function show(string $id)
    {
        $prestamo = Prestamo::with('persona')->findOrFail($id);
        return view('prestamos.show', compact('prestamo'));
    }

    


    public function edit(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $personas = Persona::all();
        return view('prestamos.edit', compact('prestamo', 'personas'));
    }

    



    public function update(Request $request, string $id)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'material' => 'required|string|max:255',
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

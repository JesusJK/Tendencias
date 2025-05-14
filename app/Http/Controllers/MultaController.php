<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multa; // Modelo de Multa
use App\Models\Prestamo; // Para manejar la relación con Prestamos

class MultaController extends Controller
{
    
    public function index()
    {
        // Obtener todas las multas junto con los prestamos asociados
        $multas = Multa::with('prestamo')->get();

        return view('multas.index', compact('multas'));
    }

    /**
     * Mostrar el formulario para crear una nueva multa.
     */
    public function create()
    {
        // Obtener todos los prestamos para asociarlos con la multa
        $prestamos = Prestamo::all();

        return view('multas.create', compact('prestamos'));
    }

    /**
     * Guardar una nueva multa en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'valor' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $multa = new Multa();
        $multa->prestamo_id = $request->prestamo_id;
        $multa->valor = $request->valor;
        $multa->fecha = $request->fecha;
        $multa->save();

        return redirect()->route('multas.index')->with('success', 'Multa creada con exito');
    }

    /**
     * Mostrar los detalles de una multa.
     */
    public function show($id)
    {
        $multa = Multa::with('prestamo')->findOrFail($id);

        return view('multas.show', compact('multa'));
    }

    /**
     * Mostrar el formulario para editar una multa.
     */
    public function edit($id)
    {
        $multa = Multa::findOrFail($id);
        $prestamos = Prestamo::all();

        return view('multas.edit', compact('multa', 'prestamos'));
    }

    /**
     * Actualizar una multa existente.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'valor' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $multa = Multa::findOrFail($id);
        $multa->prestamo_id = $request->prestamo_id;
        $multa->valor = $request->valor;
        $multa->fecha = $request->fecha;
        $multa->save();

        return redirect()->route('multas.index')->with('success', 'Multa actualizada con exito');
    }

    /**
     * Eliminar una multa.
     */
    public function destroy($id)
    {
        $multa = Multa::findOrFail($id);
        $multa->delete();

        return redirect()->route('multas.index')->with('success', 'Multa eliminada con exito');
    }
}

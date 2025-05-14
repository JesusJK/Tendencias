<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultaPrestamo;
use App\Models\Prestamo;
use App\Models\Multa;

class MultaPrestamoController extends Controller
{
    
    public function index()
    {
        
        $multaPrestamos = MultaPrestamo::with(['prestamo', 'multa'])->get();

        return view('multa_prestamos.index', compact('multaPrestamos'));
    }

    
    public function create()
    {
        $prestamos = Prestamo::all(); 
        $multas = Multa::all();       

        return view('multa_prestamos.create', compact('prestamos', 'multas'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'multa_id' => 'required|exists:multas,id',
            'valor' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $multaPrestamo = new MultaPrestamo();
        $multaPrestamo->prestamo_id = $request->prestamo_id;
        $multaPrestamo->multa_id = $request->multa_id;
        $multaPrestamo->valor = $request->valor;
        $multaPrestamo->fecha = $request->fecha;
        $multaPrestamo->save();

        return redirect()->route('multa_prestamos.index')->with('success', 'Relacion Multa-Prestamo creada con exito');
    }

    
    public function show($id)
    {
        $multaPrestamo = MultaPrestamo::with(['prestamo', 'multa'])->findOrFail($id);

        return view('multa_prestamos.show', compact('multaPrestamo'));
    }

    
    public function edit($id)
    {
        $multaPrestamo = MultaPrestamo::findOrFail($id);
        $prestamos = Prestamo::all(); 
        $multas = Multa::all();       

        return view('multa_prestamos.edit', compact('multaPrestamo', 'prestamos', 'multas'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'multa_id' => 'required|exists:multas,id',
            'valor' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);

        $multaPrestamo = MultaPrestamo::findOrFail($id);
        $multaPrestamo->prestamo_id = $request->prestamo_id;
        $multaPrestamo->multa_id = $request->multa_id;
        $multaPrestamo->valor = $request->valor;
        $multaPrestamo->fecha = $request->fecha;
        $multaPrestamo->save();

        return redirect()->route('multa_prestamos.index')->with('success', 'Relacion Multa-Prestamo actualizada con exito');
    }

    
    public function destroy($id)
    {
        $multaPrestamo = MultaPrestamo::findOrFail($id);
        $multaPrestamo->delete();

        return redirect()->route('multa_prestamos.index')->with('success', 'Relacion Multa-Prestamo eliminada con exito');
    }
}

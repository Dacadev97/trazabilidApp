<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuiaTransporte;

class GuiaTransporteController extends Controller
{
    public function index()
    {
        $guias = GuiaTransporte::all();
        return view('guias.index', compact('guias'));
    }

    public function create()
    {
        return view('guias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'estado_entrega' => 'required|string|max:20',
            'destino' => 'required|string|max:50',
            'fecha_emision' => 'required|date',
            'transportista' => 'required|string|max:50',
        ]);

        GuiaTransporte::create($request->all());

        return redirect()->route('guias.index')->with('success', 'Guía de transporte creada exitosamente.');
    }

    public function show($id)
    {
        $guia = GuiaTransporte::findOrFail($id);
        return view('guias.show', compact('guia'));
    }

    // Otros métodos según tus necesidades
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuiaTransporte;

class GuiaTransporteController extends Controller
{
    public function index()
    {
        $guias = GuiaTransporte::all();
        return view('guias.index', ['guias' => $guias]);
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

    public function show($id_guia_transporte)
    {
        $guia = GuiaTransporte::with('entregas')->where('id_guia_transporte', $id_guia_transporte)->first();
    
        if (!$guia) {
            return abort(404);
        }
    
        return view('guias.show', ['guia' => $guia]);
    }
}

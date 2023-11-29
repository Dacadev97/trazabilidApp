<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;
use App\Models\GuiaTransporte;

class EntregaController extends Controller
{
    public function index()
    {
        $entregas = Entrega::with('guiaTransporte')->get();
        $guias = GuiaTransporte::all();
        return view('entregas.index', ['entregas' => $entregas, 'guias' => $guias]);
    }

    public function create()
    {
        return view('entregas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pedido' => 'required',
            'id_cliente' => 'required|integer',
            'fecha_despacho' => 'required|date',
            'fecha_entrega' => 'required|date',
            'id_guia_transporte' => 'required|integer',
            'estado_entrega' => 'required|string|max:20',
            'observaciones' => 'nullable|string',
            'foto_guia' => 'nullable|image',
        ]);


        $guiaTransporte = new GuiaTransporte;
        $guiaTransporte->id_guia_transporte = $request->id_guia_transporte;
        $guiaTransporte->estado_entrega = $request->estado_entrega;
        $guiaTransporte->save();
    
        $entrega = new Entrega;
        $entrega->id_pedido = $request->id_pedido;
        $entrega->id_cliente = $request->id_cliente;
        $entrega->fecha_despacho = $request->fecha_despacho;
        $entrega->fecha_entrega = $request->fecha_entrega;
        $entrega->id_guia_transporte = $request->id_guia_transporte;
        $entrega->estado_entrega = $request->estado_entrega;
        $entrega->observaciones = $request->observaciones;
        $entrega->save();

        if ($request->hasFile('foto_guia')) {
            $path = $request->file('foto_guia')->store('public/fotos_guias');
            $request->merge(['foto_guia' => $path]);
        }

        return redirect()->route('entregas.index');
    }

    public function show($id)
    {
        $entrega = Entrega::find($id);
        return view('entregas.show', compact('entrega'));
    }
}

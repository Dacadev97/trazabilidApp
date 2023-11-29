<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuiaTransporte;

/**
 * Controlador para las operaciones relacionadas con las guías de transporte.
 */
class GuiaTransporteController extends Controller
{
    /**
     * Muestra una lista de todas las guías de transporte.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $guias = GuiaTransporte::all();
        return view('guias.index', ['guias' => $guias]);
    }

    /**
     * Muestra el formulario para crear una nueva guía de transporte.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('guias.create');
    }

    /**
     * Almacena una nueva guía de transporte en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Muestra los detalles de una guía de transporte específica.
     *
     * @param  int  $id_guia_transporte
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function show($id_guia_transporte)
    {
        $guia = GuiaTransporte::with('entregas')->where('id_guia_transporte', $id_guia_transporte)->first();
    
        if (!$guia) {
            return abort(404);
        }
    
        return view('guias.show', ['guia' => $guia]);
    }
}

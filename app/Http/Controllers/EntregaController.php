<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;
use App\Models\GuiaTransporte;

/**
 * Controlador para la gestión de las entregas.
 */
class EntregaController extends Controller
{
    /**
     * Muestra una lista de todas las entregas con sus respectivas guías de transporte.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $entregas = Entrega::with('guiaTransporte')->get();
        $guias = GuiaTransporte::all();
        return view('entregas.index', ['entregas' => $entregas, 'guias' => $guias]);
    }

    /**
     * Muestra el formulario para crear una nueva entrega.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('entregas.create');
    }

    /**
     * Almacena una nueva entrega en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        // Crear una nueva guía de transporte
        $guiaTransporte = new GuiaTransporte;
        $guiaTransporte->id_guia_transporte = $request->id_guia_transporte;
        $guiaTransporte->estado_entrega = $request->estado_entrega;
        $guiaTransporte->save();

        // Crear una nueva entrega
        $entrega = new Entrega;
        $entrega->id_pedido = $request->id_pedido;
        $entrega->id_cliente = $request->id_cliente;
        $entrega->fecha_despacho = $request->fecha_despacho;
        $entrega->fecha_entrega = $request->fecha_entrega;
        $entrega->id_guia_transporte = $request->id_guia_transporte;
        $entrega->estado_entrega = $request->estado_entrega;
        $entrega->observaciones = $request->observaciones;
        $entrega->save();

        // Guardar la foto de la guía de transporte si se proporciona
        if ($request->hasFile('foto_guia')) {
            $path = $request->file('foto_guia')->store('public/fotos_guias');
            $request->merge(['foto_guia' => $path]);
        }

        return redirect()->route('entregas.index');
    }

    /**
     * Muestra los detalles de una entrega específica.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $entrega = Entrega::find($id);
        return view('entregas.show', compact('entrega'));
    }

    public function edit($id)
    {
        $entrega = Entrega::find($id);
        return view('entregas.edit', compact('entrega'));
    }


    public function update(Request $request, $id)
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

        $entrega = Entrega::find($id);
        $entrega->update($request->all());

        $guiaTransporte = GuiaTransporte::findOrFail($id);
        $guiaTransporte->update([
            'estado_entrega' => $request->estado_entrega,
            'id_guia_transporte' => $request->id_guia_transporte,
        ]);


        return redirect()->route('entregas.index')->with('success', 'Entrega actualizada exitosamente.');
    }


    /**
     * Elimina una entrega y su guía de transporte asociada.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $entrega = Entrega::findOrFail($id);
        $entrega->delete();

        $guiaTransporte = GuiaTransporte::findOrFail($id);
        $guiaTransporte->delete();

        return redirect()->route('entregas.index')
            ->with('success', 'Entrega eliminada con éxito');
    }
}

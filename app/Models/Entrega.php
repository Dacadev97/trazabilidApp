<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $table = 'entrega';
    protected $primaryKey = 'id_entrega';

    protected $fillable = [
        'id_pedido',
        'id_cliente',
        'fecha_despacho',
        'fecha_entrega',
        'id_guia_transporte',
        'estado_entrega',
        'observaciones',
        'foto_guia',
    ];

    public function guiaTransporte()
    {
        return $this->belongsTo(GuiaTransporte::class, 'id_guia_transporte');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entrega
 * 
 * Modelo que representa una entrega en el sistema.
 * 
 * @package App\Models
 */
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

    /**
     * Obtiene la guía de transporte asociada a la entrega.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guiaTransporte()
    {
        return $this->belongsTo(GuiaTransporte::class, 'id_guia_transporte');
    }
}

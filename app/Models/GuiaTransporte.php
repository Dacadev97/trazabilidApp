<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GuiaTransporte
 * 
 * @package App\Models
 * 
 * @property int $id_guia_transporte
 * @property string $estado_entrega
 * @property string $destino
 * @property string $fecha_emision
 * @property string $transportista
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Entrega[] $entregas
 * @property-read int|null $entregas_count
 */
class GuiaTransporte extends Model
{
    use HasFactory;

    protected $table = 'guia_transporte';

    public $incrementing = false;


    protected $fillable = [
        'id_guia_transporte',
        'estado_entrega',
        'destino',
        'fecha_emision',
        'transportista',
    ];


    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'id_guia_transporte');
    }
}

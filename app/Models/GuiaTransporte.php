<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

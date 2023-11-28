<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiaTransporteTable extends Migration
{
    public function up()
    {
        Schema::create('guia_transporte', function (Blueprint $table) {
            $table->id(); 
            $table->string('id_guia_transporte');
            $table->string('estado_entrega')->nullable()->change(); 
            $table->string('destino')->nullable()->change();
            $table->date('fecha_emision')->nullable()->change(); 
            $table->string('transportista')->nullable()->change(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guia_transporte');
    }
}

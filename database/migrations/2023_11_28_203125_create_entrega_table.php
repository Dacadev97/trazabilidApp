<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregaTable extends Migration
{
    public function up()
    {
        Schema::create('entrega', function (Blueprint $table) {
            $table->id('id_entrega');
            $table->integer('id_pedido');
            $table->integer('id_cliente');
            $table->date('fecha_despacho');
            $table->date('fecha_entrega');
            $table->unsignedBigInteger('id_guia_transporte')->nullable();
            $table->string('estado_entrega')->nullable();
            $table->string('foto_guia')->nullable();
            $table->text('observaciones')->nullable();

            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrega');
    }
}

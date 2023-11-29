<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\GuiaTransporteController;



Route::get('/', function () {
      return redirect('/entregas');
});
Route::get('/entregas', [EntregaController::class, 'index'])->name('entregas.index');

Route::get('/entregas/create', [EntregaController::class, 'create'])->name('entregas.create');

Route::post('/entregas', [EntregaController::class, 'store'])->name('entregas.store');

Route::get('/entregas/{id}', [EntregaController::class, 'show'])->name('entregas.show');

Route::get('/guias', [GuiaTransporteController::class, 'index'])->name('guias.index');

Route::get('/guias/{id_guia_transporte}', [GuiaTransporteController::class, 'show'])->name('guias.show');

Route::delete('entregas/{entrega}', [EntregaController::class, 'destroy'])->name('entregas.destroy');

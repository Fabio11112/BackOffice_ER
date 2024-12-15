<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;
use App\Http\Controllers\CreatureController;
use App\Http\Controllers\FotoController;


Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/avistamentos', [CreatureController::class, 'showSubEspecies']);

Route::post('/updateForm', [CreatureController::class, 'updateForm'])->name('form.update');

Route::get('/analisaFoto/{id}', [FotoController::class, 'analisaFoto'])->name('analisaFoto');




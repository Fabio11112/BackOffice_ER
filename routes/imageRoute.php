<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

use App\Models\Utilizador;


Route::post('/uploadImage', [imageController::class, 'uploadImages'])->name('image.upload');


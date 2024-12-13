<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

use App\Models\Utilizador;

$link = 'http://backoffice_er.test/';


Route::post('/uploadImage', [imageController::class, 'uploadImages'])->name('image.upload');

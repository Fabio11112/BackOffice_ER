<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/avistamentos', function () {
    return view('avistamento');
});

//Route::post('/uploadImage', [imageController::class, 'uploadImages'])->name('image.upload');

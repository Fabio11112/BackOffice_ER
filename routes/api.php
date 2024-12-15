<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/uploadImage', [imageController::class, 'uploadImages'])->name('image.upload');

Route::get('/image/{id}', [imageController::class, 'getImage'])->name('image.get');
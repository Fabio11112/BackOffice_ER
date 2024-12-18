<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;
use App\Http\Controllers\metadadoController;
use App\Http\Controllers\userController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/uploadImage', [imageController::class, 'uploadImages'])->name('image.upload');

Route::post('/metadado', [metadadoController::class, 'uploadMetadado'])->name('metadado.upload');

Route::post('/user', [userController::class, 'recebeUser'])->name('user.upload');





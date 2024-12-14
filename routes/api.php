<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

Route::post('/uploadImage', [imageController::class, 'uploadImages'])->name('image.upload');
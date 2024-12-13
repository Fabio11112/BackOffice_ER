<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

$link = 'http://backoffice_er.test/';


Route::post('/uploadImage', [imageController::class, 'uploadImages'])->name('image.store');
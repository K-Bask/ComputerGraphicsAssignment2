<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('converter');
});

Route::get('/upload', [ImageController::class, 'showUploadForm'])->name('image.upload.form');
Route::post('/upload', [ImageController::class, 'uploadImage'])->name('image.upload');
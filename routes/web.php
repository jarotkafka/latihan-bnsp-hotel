<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('pesan', PesanController::class)->except(['edit']);
Route::resource('media_kamar', \App\Http\Controllers\MediaKamarController::class);
Route::get('/kamar/{tipe}', [\App\Http\Controllers\MediaKamarController::class, 'show'])->name('kamar.show');

Route::get('/api/media_kamar', [\App\Http\Controllers\MediaKamarController::class, 'apiIndex'])->name('api.media_kamar');

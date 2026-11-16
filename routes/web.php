<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login menggunakan Google
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.redirect');

// Callback dari Google
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('google.callback');
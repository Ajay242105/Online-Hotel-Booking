<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; // Corrected "app" to "App"

Route::get('/', [AdminController::class, 'home']);

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room']);
Route::post('/add_room', [AdminController::class, 'add_room']);
Route::get('/view_room', [AdminController::class, 'view_room'])->name('view_room');

Route::get('/delete_room/{id}', [AdminController::class, 'delete_room']);
Route::get('/update_room/{id}', [AdminController::class, 'update_room']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);
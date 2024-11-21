<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;



Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room']);
Route::post('/add_room', [AdminController::class, 'add_room']);
Route::get('/view_room', [AdminController::class, 'view_room'])->name('view_room');

Route::get('/delete_room/{id}', [AdminController::class, 'delete_room']);
Route::get('/update_room/{id}', [AdminController::class, 'update_room']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

Route::get('/room_details/{id}', [UserController::class, 'room_details']);
Route::post('/add_booking/{id}', [UserController::class, 'add_booking']);
Route::get('/view_bookings', [AdminController::class, 'view_bookings']);
Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);
Route::post('/accept_booking/{id}', [AdminController::class, 'accept_booking']);
Route::post('/reject_booking/{id}', [AdminController::class, 'reject_booking']);
Route::get('/view_gallery', [AdminController::class, 'view_gallery']);
Route::post('/upload_image', [AdminController::class, 'upload_image']);
Route::delete('/delete_image/{id}', [AdminController::class, 'delete_image']);


Route::post('/contact', [ContactController::class,'contact']);
Route::get('/view_messages', [AdminController::class, 'viewMessages'])->name('view.messages');
Route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);
Route::post('/mail/{id}', [AdminController::class, 'mail']);

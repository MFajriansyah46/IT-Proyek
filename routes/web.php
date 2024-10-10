<?php

use App\Models\User;
use App\Models\Owner;
use App\Models\Building;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('dashboard',['title' => 'Dashboard']);
});

Route::get('/login', function () {
    return view('login');
});

// user controller
Route::get('/users', [UserController::class,'read']);

Route::get('/users/add', [UserController::class,'add']);

Route::post('/users/submit', [UserController::class,'submit']);

Route::get('/users/edit/{id}', [UserController::class,'edit']);

Route::get('/users/update/{id}', [UserController::class,'update']);

Route::get('/users/delete/{id}', [UserController::class,'delete']);

// room controller

// Route untuk menampilkan daftar rooms
Route::get('/rooms', [RoomController::class, 'read']);

// Route untuk menampilkan form tambah room
Route::get('/rooms/add', [RoomController::class, 'add']);

// Route untuk menyimpan room baru
Route::post('/rooms/submit', [RoomController::class, 'submit']);

// Route untuk menampilkan form edit room berdasarkan id
Route::get('/rooms/edit/{room:id_kamar}', [RoomController::class, 'edit']);

// Route untuk memperbarui data room berdasarkan id
Route::post('/rooms/update/{id_kamar}', [RoomController::class, 'update']);

Route::delete('/rooms/delete/{room:id_kamar}', [RoomController::class, 'delete']);



// building controller
Route::get('/buildings', function () {
    return view('buildings',['title' => 'Buildings', 'buildings' => Building::all()]);
});

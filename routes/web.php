<?php

use App\Models\Building;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\OwnerController;



Route::get('/', function () {
    return view('dashboard',['title' => 'Dashboard']);
});



// tenant controller
Route::get('/users', [TenantController::class,'read']);

Route::post('/users/submit', [TenantController::class,'submit']);

Route::get('/users/edit/{remember_token}', [TenantController::class,'edit']);

Route::get('/users/update/{remember_token}', [TenantController::class,'update']);

Route::get('/users/delete/{remember_token}', [TenantController::class,'delete']);

Route::get('/login', [TenantController::class, 'formLogin']);

Route::post('/login', [TenantController::class, 'authenticate']);

Route::get('/register', [TenantController::class, 'formRegister']);

Route::post('/register', [TenantController::class, 'register']);



// owner controller
Route::get('/owner-login', [OwnerController::class, 'form']);

Route::post('/owner-login', [OwnerController::class, 'authenticate']);




// room controller

// Route untuk menampilkan daftar rooms
Route::get('/rooms', [RoomController::class, 'read']);

// Route untuk menampilkan form tambah room
Route::get('/rooms/add', [RoomController::class, 'add']);

// Route untuk menyimpan room baru
Route::post('/rooms/submit', [RoomController::class, 'submit']);

// Route untuk menampilkan form edit room berdasarkan id
Route::get('/rooms/edit/{id_kamar}', [RoomController::class, 'edit']);

// Route untuk memperbarui data room berdasarkan id
Route::post('/rooms/update/{id_kamar}', [RoomController::class, 'update']);

// Route untuk menghapus room berdasarkan id
Route::get('/rooms/delete/{id_kamar}', [RoomController::class, 'delete'])->name('rooms.delete');



// building controller
Route::get('/buildings', function () {
    return view('buildings',['title' => 'Buildings', 'buildings' => Building::all()]);
});

<?php

use App\Models\Building;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\OwnerLoginController;
use App\Http\Controllers\TenantLoginController;

Route::get('/', function () {
    return view('dashboard',['title' => 'Dashboard']);
});

Route::get('/owner-login', [OwnerLoginController::class, 'read']);
Route::post('/owner-login', [OwnerLoginController::class, 'authenticate']);




// user controller
Route::get('/users', [TenantController::class,'read']);

Route::get('/users/add', [TenantController::class,'add']);

Route::post('/users/submit', [TenantController::class,'submit']);

Route::get('/users/edit/{id}', [TenantController::class,'edit']);

Route::get('/users/update/{id}', [TenantController::class,'update']);

Route::get('/users/delete/{id}', [TenantController::class,'delete']);

Route::get('/login', [TenantController::class, 'readLogin']);

Route::post('/login', [TenantController::class, 'authenticate']);

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

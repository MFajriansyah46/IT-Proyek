<?php

use App\Http\Controllers\DashboardController;
use App\Models\Building;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

use App\Http\Controllers\TenantController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BuildingController;

// Aktor: Pemilik Kost
Route::middleware('auth:owner')->group(function(){
    
    Route::get('/dashboard', [DashboardController::class,'read']);

    Route::post('/owner-logout', [OwnerController::class, 'logout']);

    // tenant/user controller
    
    Route::get('/users', [TenantController::class,'read']);

    Route::get('/users/edit/{remember_token}', [TenantController::class,'edit']);
    
    Route::post('/users/update/', [TenantController::class,'update']);

    Route::post('/users/delete', [TenantController::class,'delete']);

    
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
    Route::get('/buildings', [BuildingController::class, 'read']);

    Route::get('/buildings/add', [BuildingController::class, 'add']);

    Route::post('/buildings/submit', [BuildingController::class, 'submit']);

    Route::get('/buildings/edit/{id_bangunan}', [BuildingController::class, 'edit']);

    Route::post('/buildings/update/{id_bangunan}', [BuildingController::class, 'update']);
    
    Route::get('/buildings/delete/{id_bangunan}', [BuildingController::class, 'delete']);
});


//Aktor: Penyewa
Route::middleware('auth:tenant')->group(function(){

    Route::post('/logout', [TenantController::class, 'logout']);
    
    
});

// Aktor: pengunjung
Route::middleware('guest')->group(function(){

    Route::get('/register', [TenantController::class, 'formRegister']);

    Route::post('/register', [TenantController::class, 'register']);

    Route::get('/login', [TenantController::class, 'formLogin'])->name('login');

    Route::post('/login', [TenantController::class, 'authenticate']);

    Route::get('/owner-login', [OwnerController::class, 'formLogin']);
    
    Route::post('/owner-login', [OwnerController::class, 'authenticate']);

    Route::get('/', function(){
        return view('home');
    });
});

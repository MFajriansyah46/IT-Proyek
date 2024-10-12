<?php

use App\Models\Building;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\OwnerController;


Route::middleware('auth:owner')->group(function(){
    
    Route::get('/', function () { 
        return view ('dashboard');
    });


    Route::post('/owner-logout', [OwnerController::class, 'logout']);

    // tenant/user controller
    
    Route::get('/users', [TenantController::class,'read']);

    Route::get('/users/edit/{remember_token}', [TenantController::class,'edit']);
    
    Route::post('/users/update/', [TenantController::class,'update']);

    Route::get('/users/delete/{remember_token}', [TenantController::class,'delete']);

    
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
});

Route::get('/owner-login', [OwnerController::class, 'formLogin']);
    
Route::post('/owner-login', [OwnerController::class, 'authenticate']);

Route::get('/login', [TenantController::class, 'formLogin'])->name('login')->middleware('guest');
    
Route::post('/login', [TenantController::class, 'authenticate']);

Route::get('/register', [TenantController::class, 'formRegister'])->middleware('guest');;
    
Route::post('/register', [TenantController::class, 'register']);

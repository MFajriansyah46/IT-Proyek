<?php

use App\Models\User;
use App\Models\Owner;
use App\Models\Building;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BuildingController;

Route::get('/', function () {
    return view('dashboard',['title' => 'Dashboard']);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

// user controller
Route::get('/users', [UserController::class,'read']);

Route::get('/users/add', [UserController::class,'add']);

Route::post('/users/submit', [UserController::class,'submit']);

Route::get('/users/edit/{id}', [UserController::class,'edit']);

Route::get('/users/update/{id}', [UserController::class,'update']);

Route::get('/users/delete/{id}', [UserController::class,'delete']);

// room controller
Route::get('/rooms', [RoomController::class, 'read']);

Route::get('/rooms/add', [RoomController::class, 'add']);

Route::post('/rooms/submit', [RoomController::class, 'submit']);

Route::get('/rooms/edit/{id_kamar}', [RoomController::class, 'edit']);

Route::post('/rooms/update/{id_kamar}', [RoomController::class, 'update']);

Route::get('/rooms/delete/{id_kamar}', [RoomController::class, 'delete'])->name('rooms.delete');


// building controller
Route::get('/buildings', [BuildingController::class, 'read']);
Route::get('/buildings/add', [BuildingController::class, 'add']);
Route::post('/buildings/submit', [BuildingController::class, 'submit']);
Route::get('/buildings/edit/{id_bangunan}', [BuildingController::class, 'edit']);
Route::post('/buildings/update/{id_bangunan}', [BuildingController::class, 'update']);
Route::get('/buildings/delete/{id_bangunan}', [BuildingController::class, 'delete']);

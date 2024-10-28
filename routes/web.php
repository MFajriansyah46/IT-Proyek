<?php

use App\Models\Rent;
use App\Models\Room;
use App\Models\Building;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\DashboardController;

// Aktor: Pemilik Kost
Route::middleware('auth:owner')->group(function(){

    Route::get('/dashboard', [DashboardController::class,'read']);

    Route::post('/owner-logout', [ValidasiController::class, 'logoutOwner']);

    // tenant/user controller
    Route::get('/users', [TenantController::class,'read']);

    Route::get('/users/edit/{remember_token}', [TenantController::class,'edit']);

    Route::post('/users/update/', [TenantController::class,'update']);

    Route::post('/users/delete', [TenantController::class,'delete']);


    // room controller

    Route::get('/rooms', [RoomController::class, 'read']);

    Route::get('/rooms/add', [RoomController::class, 'add']);

    Route::post('/rooms/submit', [RoomController::class, 'submit'])->name('rooms.submit');

    Route::get('/rooms/edit/{id_kamar}', [RoomController::class, 'edit'])->name('rooms.edit');

    Route::post('/rooms/update/{id_kamar}', [RoomController::class, 'update'])->name('rooms.update');

    Route::get('/rooms/delete/{id_kamar}', [RoomController::class, 'delete'])->name('rooms.delete');

    // building controller
    Route::get('/buildings', [BuildingController::class, 'read']);

    Route::get('/buildings/add', [BuildingController::class, 'add']);

    Route::post('/buildings/submit', [BuildingController::class, 'submit']);

    Route::get('/buildings/edit/{token}', [BuildingController::class, 'edit']);

    Route::post('/buildings/update/', [BuildingController::class, 'update']);
    
    Route::delete('/buildings/delete/', [BuildingController::class, 'delete'])->name('buildings.delete');
});


//Aktor: Penyewa
Route::middleware('auth:tenant')->group(function(){

    Route::post('/logout', [ValidasiController::class, 'logout']);

    Route::post('/checkout', [PaymentController::class, 'process']);
    
    Route::get('/checkout/{snap_token}', [PaymentController::class, 'checkout']);

    Route::get('/checkout/success/{snap_token}', [PaymentController::class, 'paymentSuccess']);


});

// Aktor: pengunjung
Route::middleware('guest')->group(function(){

    Route::get('/register', [ValidasiController::class, 'formRegister']);

    Route::post('/register', [ValidasiController::class, 'register']);

    Route::get('/login', [ValidasiController::class, 'formLogin'])->name('login');

    Route::post('/login', [ValidasiController::class, 'authenticate']);

    Route::get('/owner-login', [ValidasiController::class, 'formLoginOwner']);
    
    Route::post('/owner-login', [ValidasiController::class, 'authenticateOwner']);

    Route::get('/', function(){
        
        return view('home');
    
    });

    Route::get('/rooms-list',[function(){

            $rooms = Room::all();
            return view('roomPublicList',['rooms' => $rooms]);
        }
    ]);

    Route::get('/rooms-list/detail', [PaymentController::class, 'detail']);
});
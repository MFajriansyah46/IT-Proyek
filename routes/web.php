<?php

use App\Http\Controllers\OwnerController;
use App\Models\Rate;
use App\Models\Rent;
use App\Models\Room;
use App\Models\Building;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoommateController;
use App\Http\Middleware\GoogleTenantAccess;


Route::middleware('auth:owner')->group(function(){

    Route::get('/dashboard', [DashboardController::class,'read']);

    Route::post('/update-owner-profile', [OwnerController::class,'update']);

    // tenant/user controller
    Route::get('/users', [TenantController::class,'read']);

    Route::get('/users/edit/{remember_token}', [TenantController::class,'edit']);

    Route::post('/users/update/', [TenantController::class,'update']);

    Route::post('/users/delete', [TenantController::class,'delete']);


    // room controller
    Route::get('/rooms/add', [RoomController::class, 'add']);

    Route::post('/rooms/submit', [RoomController::class, 'submit'])->name('rooms.submit');

    Route::get('/rooms/edit/{remember_token}', [RoomController::class, 'edit'])->name('rooms.edit');

    Route::post('/rooms/update/', [RoomController::class, 'update'])->name('rooms.update');

    Route::get('/rooms/delete/', [RoomController::class, 'delete'])->name('rooms.delete');

    // building controller
    Route::get('/buildings', [BuildingController::class, 'read']);

    Route::get('/buildings/add', [BuildingController::class, 'add']);

    Route::post('/buildings/submit', [BuildingController::class, 'submit']);

    Route::get('/buildings/edit/{remember_token}', [BuildingController::class, 'edit']);

    Route::post('/buildings/update/', [BuildingController::class, 'update']);

    Route::post('/buildings/delete/', [BuildingController::class, 'delete']);

    Route::get('/active-rental', function() { return view('rent.rents',['rents' => Rent::all()]); });

    Route::get('/transactions', function() { return view('transaction.transactions',['transactions' => Transaction::orderBy('id', 'desc')->get()]); });

    Route::get('/confirm/payment/{snap_token}', [PaymentController::class,'confirmation']);
});

Route::middleware('auth:tenant')->group(function(){

    Route::post('/edit-profile', [ProfileController::class, 'editProfile']);

    Route::post('/checkout', [PaymentController::class, 'pay']);

    Route::get('/checkout/{snap_token}', [PaymentController::class, 'checkout']);

    Route::get('/proof',[PaymentController::class,'proof']);

    Route::get('/myroom', [ProfileController::class,"rentedRoom"]);

    Route::get('/myroom/download-proof/{doc}', [ProfileController::class,"downloadProof"]);

    Route::post('/myroom/rate', [PaymentController::class,'rate']);

    Route::post('/roommate', [RoommateController::class, 'submit'])->name('roommate.submit');
    Route::delete('/roommate', [RoommateController::class, 'delete'])->name('roommate.delete');
});


Route::middleware('guest')->group(function(){

    Route::get('/', function(){ return view('home'); });

    Route::get('/register', [ValidasiController::class, 'formRegister']);

    Route::post('/register', [ValidasiController::class, 'register']);

    Route::get('/owner-login', [ValidasiController::class, 'loginOwner']);
    
    Route::get('/login', [ValidasiController::class, 'login'])->name('login');

    Route::post('/authentication', [ValidasiController::class, 'authenticate']);

    Route::post('/logout', [ValidasiController::class, 'logout']);

    Route::get('/rooms', [RoomController::class,'read']);

    Route::get('/rooms/detail', [PaymentController::class, 'detail']);  

    Route::get('/checkout/success/{snap_token}', [PaymentController::class, 'rent']);

    Route::get('/discard/{token}', [ProfileController::class,"discardRentedRoom"]);
});


<?php

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

// Aktor: Pemilik Kost
Route::middleware('auth:owner')->group(function(){

    Route::get('/dashboard', [DashboardController::class,'read']);

    // tenant/user controller
    Route::get('/users', [TenantController::class,'read']);

    Route::get('/users/edit/{remember_token}', [TenantController::class,'edit']);

    Route::post('/users/update/', [TenantController::class,'update']);

    Route::post('/users/delete', [TenantController::class,'delete']);


    // room controller
    Route::get('/rooms/add', [RoomController::class, 'add']);

    Route::post('/rooms/submit', [RoomController::class, 'submit'])->name('rooms.submit');

    Route::get('/rooms/edit/{token}', [RoomController::class, 'edit'])->name('rooms.edit');

    Route::post('/rooms/update/{id_kamar}', [RoomController::class, 'update'])->name('rooms.update');

    Route::get('/rooms/delete/{id_kamar}', [RoomController::class, 'delete'])->name('rooms.delete');

    // building controller
    Route::get('/buildings', [BuildingController::class, 'read']);

    Route::get('/buildings/add', [BuildingController::class, 'add']);

    Route::post('/buildings/submit', [BuildingController::class, 'submit']);

    Route::get('/buildings/edit/{token}', [BuildingController::class, 'edit']);

    Route::post('/buildings/update/', [BuildingController::class, 'update']);

    Route::post('/buildings/delete/', [BuildingController::class, 'delete']);

    Route::get('/active-rental', function() {

        $rents = Rent::all();

        return view('rent.rents',['rents' => $rents]);
    });

    Route::get('/transactions', function() {

        $transactions = Transaction::orderBy('id', 'desc')->get();

        return view('transaction.transactions',['transactions' => $transactions]);
    });

    Route::get('/confirm/payment/{snap_token}', function($snap_token){

        $transaction = Transaction::where('snap_token',$snap_token)->first();
        $transaction->status = true;
        $transaction->update();

        if($transaction->status) {
            $rent = new Rent();
            $rent->id_kamar = $transaction->room_id;
            $rent->id_penyewa = $transaction->tenant_id;
            $rent->tanggal_masuk = now('Asia/Makassar');
            $rent->token = Str::random(16);
            $rent->save();
        }
        return redirect('/transactions')->with('payment-success','Payment Confirmed');
    });
});

Route::middleware('auth:tenant')->group(function(){

    Route::post('/edit-profile', [ProfileController::class, 'editProfile']);

    Route::post('/checkout', [PaymentController::class, 'pay']);

    Route::get('/checkout/{snap_token}', [PaymentController::class, 'checkout']);

    Route::get('/myroom', [ProfileController::class,"rentedRoom"]);

    Route::post('/myroom/rate', [PaymentController::class,'rate']);

    Route::post('/roommate', [RoommateController::class, 'store'])->name('roommate.store');
    Route::delete('/roommate', [RoommateController::class, 'delete'])->name('roommate.delete');
});


Route::middleware('guest')->group(function(){

    Route::get('/register', [ValidasiController::class, 'formRegister']);

    Route::post('/register', [ValidasiController::class, 'register']);

    Route::get('/login', [ValidasiController::class, 'formLogin'])->name('login');

    Route::post('/login', [ValidasiController::class, 'authenticate']);

    Route::get('/owner-login', [ValidasiController::class, 'formLoginOwner']);

    Route::post('/owner-login', [ValidasiController::class, 'authenticateOwner']);

    Route::post('/logout', [ValidasiController::class, 'logout']);

    Route::get('/', function(){

        return view('home');
    });

    Route::get('/rooms', [RoomController::class,'read']);

    Route::get('/rooms-list/detail', [PaymentController::class, 'detail']);

    Route::get('/checkout/success/{snap_token}', [PaymentController::class, 'rent']);

    Route::get('/discard/{token}', [ProfileController::class,"discardRentedRoom"]);
});


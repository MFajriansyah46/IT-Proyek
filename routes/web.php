<?php

use  App\Models\User;
use  App\Models\Owner;
use  App\Models\Building;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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



//room controller
Route::get('/rooms', function () {
    return view('rooms',['title' => 'Rooms']);
});




//building controller
Route::get('/buildings', function () {
    return view('buildings',['title' => 'Buildings', 'buildings' => Building::all()]);
});







// Route::get('/posts/{post:slug}', function(Post $post) {
//     return view('post',['title' => 'Single Post','post' => $post]);
// });

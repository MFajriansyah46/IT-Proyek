<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use  App\Models\Post;
use  App\Models\User;


Route::get('/', function () {
    return view('dashboard',['title' => 'Dashboard']);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/users', function () {
    return view('users',['title' => 'Users' , 'users' => User::all()]);
});

Route::get('/rooms', function () {
    return view('rooms',['title' => 'Rooms']);
});

Route::get('/buildings', function () {
    return view('buildings',['title' => 'Buildings']);
});

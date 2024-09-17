<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    return view('testing');
});

Route::get('/login', function () {
    return view('login');
});
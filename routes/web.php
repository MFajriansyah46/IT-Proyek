<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home',['title' => 'Home Page']);
});

Route::get('/blog', function () {
    return view('blog',['title' => 'Blog']);
});













Route::get('/login', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
});
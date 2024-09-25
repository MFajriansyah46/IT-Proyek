<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use  App\Models\Post;

Route::get('/', function () {
    return view('home',['title' => 'Home Page']);
});

Route::get('/posts', function () {
    return view('posts',['title' => 'Blog','posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function(Post $post) {

    return view('post',['title' => 'Single Post','post' => $post]);
});




Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('dashboard',['title' => 'Dashboard']);
});

Route::get('/users', function () {
    return view('users',['title' => 'Users']);
});

Route::get('/rooms', function () {
    return view('rooms',['title' => 'Rooms']);
});

Route::get('/buildings', function () {
    return view('buildings',['title' => 'Buildings']);
});




Route::get('/welcome', function () {
    return view('welcome');
});
<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use  App\Models\Post;
use  App\Models\User;
use  App\Models\Category;

Route::get('/', function () {
    return view('home',['title' => 'Home Page']);
});

Route::get('/posts', function () {
    return view('posts',[
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{post:slug}', function(Post $post) {

    return view('post',[
        'title' => 'Single Post',
        'post' => $post
    ]);
});

Route::get('/authors/{user:username}', function(User $user) {

    return view('posts',[
        'title' => count($user->posts) . ' Articles by '.$user->name,
        'posts' => $user->posts
    ]);
});

Route::get('/category/{category:slug}', function(Category $category) {

    return view('posts',[
        'title' => $category->name,
        'posts' => $category->posts
    ]);
});
<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home',['title' => 'Home Page']);
});

Route::get('/posts', function () {
    return view('posts',['title' => 'Blog','posts' => [
        [
            'id' => 1,
            'title' => 'Metode TOPSIS Untuk Rekomendasi Kamar Terbaik',
            'author' => 'M. Fajriansyah',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore deleniti beatae illum cum rem possimus amet ex illo aut architecto temporibus dicta, sapiente at maiores quasi. Consequuntur non natus quisquam, totam perferendis, vero quasi nostrum, dolorem animi eius enim! Porro enim quia aliquam deserunt autem voluptatibus vel, cupiditate sunt molestias non odio. Iste sint inventore minima, sunt voluptate totam quaerat eos pariatur nisi, et, illum adipisci! Incidunt quod dicta rem architecto modi tempora. Repellendus accusantium quia fugiat ex sit recusandae cum reiciendis facere modi vitae cumque maiores ipsa repudiandae laudantium dicta natus eum, obcaecati ut! Ab, et aperiam corrupti dolores aut id ducimus nisi, eum cupiditate a, optio tenetur! Id enim molestias ut quam sed repellat porro beatae, incidunt est ea aliquid unde laborum ex, expedita fuga, cupiditate perferendis dolorem fugiat eaque repellendus nisi non. Accusamus quisquam maxime repellat blanditiis. Molestiae facere dolor consectetur fugit officia tenetur ipsam perferendis numquam veritatis inventore nam atque, ducimus commodi eaque doloribus magni aliquam soluta beatae deserunt temporibus non a. Perferendis amet at repellendus architecto eos beatae, quasi aspernatur repudiandae aperiam velit optio consequatur quisquam ipsa, cum totam ipsum necessitatibus perspiciatis. Esse laborum qui dignissimos necessitatibus. Pariatur facere dolor animi reprehenderit facilis harum ducimus.'

        ],
        [
            'id' => 2,
            'title' => 'Sistem Informasi Kepegawaian Pemerintah Kabupaten Tanah Laut Berbasis WEB',
            'author' => 'M. Fajriansyah',
            'body' => 'Repellendus accusantium quia fugiat ex sit recusandae cum reiciendis facere modi vitae cumque maiores ipsa repudiandae laudantium dicta natus eum, obcaecati ut! Ab, et aperiam corrupti dolores aut id ducimus nisi, eum cupiditate a, optio tenetur! Id enim molestias ut quam sed repellat porro beatae, incidunt est ea aliquid unde laborum ex, expedita fuga, cupiditate perferendis dolorem fugiat eaque repellendus nisi non. Accusamus quisquam maxime repellat blanditiis. Molestiae facere dolor consectetur fugit officia tenetur ipsam perferendis numquam veritatis inventore nam atque, ducimus commodi eaque doloribus magni aliquam soluta beatae deserunt temporibus non a. Perferendis amet at repellendus architecto eos beatae, quasi aspernatur repudiandae aperiam velit optio consequatur quisquam ipsa, cum totam ipsum necessitatibus perspiciatis. Esse laborum qui dignissimos necessitatibus. Pariatur facere dolor animi reprehenderit facilis harum ducimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore deleniti beatae illum cum rem possimus amet ex illo aut architecto temporibus dicta, sapiente at maiores quasi. Consequuntur non natus quisquam, totam perferendis, vero quasi nostrum, dolorem animi eius enim! Porro enim quia aliquam deserunt autem voluptatibus vel, cupiditate sunt molestias non odio. Iste sint inventore minima, sunt voluptate totam quaerat eos pariatur nisi, et, illum adipisci! Incidunt quod dicta rem architecto modi tempora.'

        ]
    ]]);
});

Route::get('/posts/{id}', function($id) {
    $posts = [
        [
            'id' => 1,
            'title' => 'Metode TOPSIS Untuk Rekomendasi Kamar Terbaik',
            'author' => 'M. Fajriansyah',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore deleniti beatae illum cum rem possimus amet ex illo aut architecto temporibus dicta, sapiente at maiores quasi. Consequuntur non natus quisquam, totam perferendis, vero quasi nostrum, dolorem animi eius enim! Porro enim quia aliquam deserunt autem voluptatibus vel, cupiditate sunt molestias non odio. Iste sint inventore minima, sunt voluptate totam quaerat eos pariatur nisi, et, illum adipisci! Incidunt quod dicta rem architecto modi tempora. Repellendus accusantium quia fugiat ex sit recusandae cum reiciendis facere modi vitae cumque maiores ipsa repudiandae laudantium dicta natus eum, obcaecati ut! Ab, et aperiam corrupti dolores aut id ducimus nisi, eum cupiditate a, optio tenetur! Id enim molestias ut quam sed repellat porro beatae, incidunt est ea aliquid unde laborum ex, expedita fuga, cupiditate perferendis dolorem fugiat eaque repellendus nisi non. Accusamus quisquam maxime repellat blanditiis. Molestiae facere dolor consectetur fugit officia tenetur ipsam perferendis numquam veritatis inventore nam atque, ducimus commodi eaque doloribus magni aliquam soluta beatae deserunt temporibus non a. Perferendis amet at repellendus architecto eos beatae, quasi aspernatur repudiandae aperiam velit optio consequatur quisquam ipsa, cum totam ipsum necessitatibus perspiciatis. Esse laborum qui dignissimos necessitatibus. Pariatur facere dolor animi reprehenderit facilis harum ducimus.'

        ],
        [
            'id' => 2,
            'title' => 'Sistem Informasi Kepegawaian Pemerintah Kabupaten Tanah Laut Berbasis WEB',
            'author' => 'M. Fajriansyah',
            'body' => 'Repellendus accusantium quia fugiat ex sit recusandae cum reiciendis facere modi vitae cumque maiores ipsa repudiandae laudantium dicta natus eum, obcaecati ut! Ab, et aperiam corrupti dolores aut id ducimus nisi, eum cupiditate a, optio tenetur! Id enim molestias ut quam sed repellat porro beatae, incidunt est ea aliquid unde laborum ex, expedita fuga, cupiditate perferendis dolorem fugiat eaque repellendus nisi non. Accusamus quisquam maxime repellat blanditiis. Molestiae facere dolor consectetur fugit officia tenetur ipsam perferendis numquam veritatis inventore nam atque, ducimus commodi eaque doloribus magni aliquam soluta beatae deserunt temporibus non a. Perferendis amet at repellendus architecto eos beatae, quasi aspernatur repudiandae aperiam velit optio consequatur quisquam ipsa, cum totam ipsum necessitatibus perspiciatis. Esse laborum qui dignissimos necessitatibus. Pariatur facere dolor animi reprehenderit facilis harum ducimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore deleniti beatae illum cum rem possimus amet ex illo aut architecto temporibus dicta, sapiente at maiores quasi. Consequuntur non natus quisquam, totam perferendis, vero quasi nostrum, dolorem animi eius enim! Porro enim quia aliquam deserunt autem voluptatibus vel, cupiditate sunt molestias non odio. Iste sint inventore minima, sunt voluptate totam quaerat eos pariatur nisi, et, illum adipisci! Incidunt quod dicta rem architecto modi tempora.'

        ]
    ];

    $post = Arr::first( $posts,function($post) use ($id) {
        return $post['id'] == $id;
    });

    return view('post',['title' => 'Single Post','post' => $post]);
});



















Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/welcome', function () {
    return view('welcome');
});
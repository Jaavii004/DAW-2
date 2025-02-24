<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio'); // Vista de inicio
});

Route::get('/posts', function () {
    return view('posts.listado'); // Vista del listado de posts
})->name('post_listado');

Route::get('/posts/{id}', function ($id) {
    return view('posts.ficha', compact('id')); // Vista de ficha del post
})->name('post_ficha')->where('id', '[0-9]+');

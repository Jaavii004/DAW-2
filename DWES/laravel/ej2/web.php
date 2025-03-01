<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/posts', function () {
    return view('posts.listado');
})->name('post_listado');

Route::get('/posts/{id}', function ($id) {
    return view('posts.ficha', compact('id'));
})->name('post_ficha')->where('id', '[0-9]+');

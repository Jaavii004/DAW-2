<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        return view('posts.index');
    }

    public function show($id) {
        return view('posts.show', compact('id'));
    }

    public function create(){
        return redirect()->route('inicio');
    }

    public function edit($id){
        return redirect()->route('inicio');
    }
}

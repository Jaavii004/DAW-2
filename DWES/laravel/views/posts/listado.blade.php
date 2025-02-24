<!-- resources/views/posts/listado.blade.php -->

@extends('plantilla')

@section('title', 'Listado de posts') <!-- Título de la página de listado -->

@section('content')
    <h1>Listado de posts</h1>
    <p>Aquí podrás ver todos los posts disponibles.</p>
    <ul>
        <li><a href="{{ route('post_ficha', ['id' => 1]) }}">Post 1</a></li>
        <li><a href="{{ route('post_ficha', ['id' => 2]) }}">Post 2</a></li>
        <li><a href="{{ route('post_ficha', ['id' => 3]) }}">Post 3</a></li>
        <li><a href="{{ route('post_ficha', ['id' => 4]) }}">Post 4</a></li>
    </ul>
@endsection

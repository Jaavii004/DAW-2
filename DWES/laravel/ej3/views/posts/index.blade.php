@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido')
    <h1>Listado de posts</h1>
    <ul>
        <li><a href="{{ route('posts.show', ['post' => 1]) }}">Post 1</a></li>
        <li><a href="{{ route('posts.show', ['post' => 2]) }}">Post 2</a></li>
        <li><a href="{{ route('posts.show', ['post' => 3]) }}">Post 3</a></li>
    </ul>
@endsection

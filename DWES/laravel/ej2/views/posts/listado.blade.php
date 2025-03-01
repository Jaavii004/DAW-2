@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido')
    <h1>Listado de posts</h1>
    <ul>
        <li><a href="{{ route('post_ficha', ['id' => 1]) }}">Post 1</a></li>
        <li><a href="{{ route('post_ficha', ['id' => 2]) }}">Post 2</a></li>
        <li><a href="{{ route('post_ficha', ['id' => 3]) }}">Post 3</a></li>
    </ul>
@endsection

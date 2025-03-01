@extends('plantilla')

@section('titulo', 'Listado posts')

@section('contenido')
    <h1>Listado de posts</h1>

    <div class="list-group mt-4">
    @foreach ($posts as $post)
        <h2>{{ $post->titulo }} ({{ $post->usuario->nombre }})</h2>
        <p>{{ $post->contenido }}</p>
    @endforeach

    </div>

@endsection
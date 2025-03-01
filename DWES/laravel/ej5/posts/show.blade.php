@extends('plantilla')

@section('titulo', 'Ficha del Post')

@section('contenido')
    <h1>{{ $post->titulo }}</h1>
    <p>{{ $post->contenido }}</p>
    <p><em>Publicado el: {{ $post->created_at->format('d/m/Y H:i') }}</em></p>
    
    <a href="{{ route('posts.index') }}">Volver al listado</a>
@endsection

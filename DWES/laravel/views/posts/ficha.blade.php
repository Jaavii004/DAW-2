<!-- resources/views/posts/ficha.blade.php -->

@extends('plantilla')

@section('title', 'Ficha del post') <!-- Título de la página de ficha -->

@section('content')
    <h1>Ficha del post {{ $id }}</h1>
    <p>Aquí verás los detalles del post con ID: {{ $id }}</p>
@endsection

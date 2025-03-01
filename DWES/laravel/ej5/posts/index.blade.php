@extends('plantilla')

@section('titulo', 'Listado de Posts')

@section('contenido')
    <h1>Listado de posts</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($posts as $post)
            <li>
                <strong>{{ $post->titulo }}</strong>
                <a href="{{ route('posts.show', $post->id) }}">Ver</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Borrar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

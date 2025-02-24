<!-- resources/views/plantilla.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página del blog')</title> <!-- Título de la página (con valor por defecto) -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Mi Blog</h1>
        @include('partials.nav') <!-- Barra de navegación -->
    </header>
    
    <div class="container">
        <!-- Sección de contenido principal -->
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2025 Mi Blog</p>
    </footer>
</body>
</html>

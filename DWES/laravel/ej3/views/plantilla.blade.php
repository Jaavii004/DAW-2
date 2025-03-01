<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
</head>
<body>
    @include('partials.nav')
    
    <main>
        @yield('contenido')
    </main>
</body>
</html>

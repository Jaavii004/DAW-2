<!-- resources/views/posts.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Posts</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Listado de Posts</h1>
        </header>
        <main>
            <div class="posts">
                <p>Bienvenido al listado de posts. Aquí podrás ver la lista de todos nuestros posts.</p>
                <ul>
                    <li><a href="{{ route('post_ficha', ['id' => 1]) }}">Post 1</a></li>
                    <li><a href="{{ route('post_ficha', ['id' => 2]) }}">Post 2</a></li>
                    <li><a href="{{ route('post_ficha', ['id' => 3]) }}">Post 3</a></li>
                    <li><a href="{{ route('post_ficha', ['id' => 4]) }}">Post 4</a></li>
                </ul>
            </div>
        </main>
        <footer>
            <p>&copy; 2025 Mi Blog</p>
        </footer>
    </div>
</body>
</html>

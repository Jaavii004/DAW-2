<?php

/**
 * @Author: Javier Puertas
 */

// Crea un formulario en el que se le pida al usuario los siguientes datos: nombre y preferencia de
// idioma, color y ciudad. Crea una Cookie que almacene estos datos y que, al recargar la página
// por realizar una nueva selección de datos (y posiblemente usuario) muestre los datos
// introducidos en el formulario junto con los datos obtenidos de la Cookie.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar los datos en cookies
    setcookie("nombre", $_POST['nombre'], time() + 3600);
    setcookie("idioma", $_POST['idioma'], time() + 3600);
    setcookie("color", $_POST['color'], time() + 3600);
    setcookie("ciudad", $_POST['ciudad'], time() + 3600);
}

// Obtener datos de cookies
$nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';
$idioma = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : '';
$color = isset($_COOKIE['color']) ? $_COOKIE['color'] : '';
$ciudad = isset($_COOKIE['ciudad']) ? $_COOKIE['ciudad'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Cookies</title>
</head>
<body>
    <h1>Formulario de Datos del Usuario</h1>
    
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>" required>
        <br>
        <label for="idioma">Idioma:</label>
        <select name="idioma">
            <option value="español" <?php if ($idioma == 'español') echo 'selected'; ?>>Español</option>
            <option value="ingles" <?php if ($idioma == 'ingles') echo 'selected'; ?>>Inglés</option>
        </select>
        <br>
        <label for="color">Color favorito:</label>
        <input type="color" name="color" value="<?php echo $color; ?>">
        <br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" value="<?php echo $ciudad; ?>" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Datos actuales:</h2>
    <p>Nombre: <?php echo $nombre; ?></p>
    <p>Idioma: <?php echo $idioma; ?></p>
    <p>Color favorito: <span style="background-color: <?php echo $color; ?>;"><?php echo $color; ?></span></p>
    <p>Ciudad: <?php echo $ciudad; ?></p>

    <h2>Datos anteriores (cookies):</h2>
    <p>Nombre anterior: <?php echo isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : 'Ninguno'; ?></p>
    <p>Idioma anterior: <?php echo isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'Ninguno'; ?></p>
    <p>Color anterior: <?php echo isset($_COOKIE['color']) ? $_COOKIE['color'] : 'Ninguno'; ?></p>
    <p>Ciudad anterior: <?php echo isset($_COOKIE['ciudad']) ? $_COOKIE['ciudad'] : 'Ninguna'; ?></p>
</body>
</html>

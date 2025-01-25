<?php

/**
 * @Author: Javier Puertas
 */

// Crea un formulario en el que se le pida al usuario los siguientes datos: nombre y preferencia de
// idioma, color y ciudad. Crea una Cookie que almacene estos datos y que, al recargar la página
// por realizar una nueva selección de datos (y posiblemente usuario) muestre los datos
// introducidos en el formulario junto con los datos obtenidos de la Cookie.

// Recuperar los valores anteriores de las cookies antes de sobrescribirlas
$nombre_anterior = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : 'Ninguno';
$idioma_anterior = isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'Ninguno';
$color_anterior = isset($_COOKIE['color']) ? $_COOKIE['color'] : 'Ninguno';
$ciudad_anterior = isset($_COOKIE['ciudad']) ? $_COOKIE['ciudad'] : 'Ninguna';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar los datos actuales en cookies
    setcookie("nombre", $_POST['nombre'], time() + 3600);
    setcookie("idioma", $_POST['idioma'], time() + 3600);
    setcookie("color", $_POST['color'], time() + 3600);
    setcookie("ciudad", $_POST['ciudad'], time() + 3600);

    // Actualizar los valores actuales para mostrar
    $nombre_actual = $_POST['nombre'];
    $idioma_actual = $_POST['idioma'];
    $color_actual = $_POST['color'];
    $ciudad_actual = $_POST['ciudad'];
} else {
    // Si no se ha enviado el formulario, usar los valores actuales desde las cookies
    $nombre_actual = $nombre_anterior;
    $idioma_actual = $idioma_anterior;
    $color_actual = $color_anterior;
    $ciudad_actual = $ciudad_anterior;
}

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
        <input type="text" name="nombre" value="<?php echo $nombre_actual; ?>" required>
        <br>
        <label for="idioma">Idioma:</label>
        <select name="idioma">
            <option value="español" <?php if ($idioma_actual == 'español') echo 'selected'; ?>>Español</option>
            <option value="ingles" <?php if ($idioma_actual == 'ingles') echo 'selected'; ?>>Inglés</option>
        </select>
        <br>
        <label for="color">Color favorito:</label>
        <input type="color" name="color" value="<?php echo $color_actual; ?>">
        <br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" value="<?php echo $ciudad_actual; ?>" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Datos actuales:</h2>
    <p>Nombre: <?php echo $nombre_actual; ?></p>
    <p>Idioma: <?php echo $idioma_actual; ?></p>
    <p>Color favorito: <span style="background-color: <?php echo $color_actual; ?>;"><?php echo $color_actual; ?></span></p>
    <p>Ciudad: <?php echo $ciudad_actual; ?></p>

    <h2>Datos anteriores (cookies):</h2>
    <p>Nombre anterior: <?php echo ($nombre_anterior); ?></p>
    <p>Idioma anterior: <?php echo ($idioma_anterior); ?></p>
    <p>Color anterior: <span style="background-color: <?php echo $color_anterior; ?>;"><?php echo $color_anterior; ?></span></p>
    <p>Ciudad anterior: <?php echo ($ciudad_anterior); ?></p>
</body>
</html>

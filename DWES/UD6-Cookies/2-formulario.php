<?php

/**
 * @Author: Javier Puertas
 */

// Crea un formulario en el que se le pida al usuario los siguientes datos: nombre y preferencia de
// idioma, color y ciudad. Crea una Cookie que almacene estos datos y que, al recargar la página
// por realizar una nueva selección de datos (y posiblemente usuario) muestre los datos
// introducidos en el formulario junto con los datos obtenidos de la Cookie.

// Recuperar los valores anteriores desde la cookie
$datos_anteriores = isset($_COOKIE['datos']) ? json_decode($_COOKIE['datos'], true) : [
    'nombre' => 'Ninguno',
    'idioma' => 'Ninguno',
    'color' => '#ffffff',
    'ciudad' => 'Ninguna'
];

$nombre_actual = $datos_anteriores['nombre'];
$idioma_actual = $datos_anteriores['idioma'];
$color_actual = $datos_anteriores['color'];
$ciudad_actual = $datos_anteriores['ciudad'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar los datos actuales en una única cookie
    $datos_actuales = [
        'nombre' => $_POST['nombre'],
        'idioma' => $_POST['idioma'],
        'color' => $_POST['color'],
        'ciudad' => $_POST['ciudad']
    ];
    setcookie("datos", json_encode($datos_actuales), time() + 3600);

    // Actualizar los valores actuales para mostrar
    $nombre_actual = $_POST['nombre'];
    $idioma_actual = $_POST['idioma'];
    $color_actual = $_POST['color'];
    $ciudad_actual = $_POST['ciudad'];
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
    <p>Nombre anterior: <?php echo $datos_anteriores['nombre']; ?></p>
    <p>Idioma anterior: <?php echo $datos_anteriores['idioma']; ?></p>
    <p>Color anterior: <span style="background-color: <?php echo $datos_anteriores['color']; ?>;"><?php echo $datos_anteriores['color']; ?></span></p>
    <p>Ciudad anterior: <?php echo $datos_anteriores['ciudad']; ?></p>
</body>
</html>

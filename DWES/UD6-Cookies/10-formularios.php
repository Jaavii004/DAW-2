<?php

/**
 * @Author: Javier Puertas
 */

// Usa el formulario (Ejercicio 22 UD5) que guarde en una Cookie la preferencia del usuario de si
// desea o no recibir publicidad y que muestre la opción anterior y la nueva elegida en caso de que
// la modifique.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar la preferencia en cookies
    setcookie("publicidad", $_POST['publicidad'], time() + 3600);
}

// Obtener datos de cookies
$publicidad = isset($_COOKIE['publicidad']) ? $_COOKIE['publicidad'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 10 - Publicidad</title>
</head>
<body>
    <h1>Formulario de Preferencia de Publicidad</h1>
    
    <form method="POST" action="">
        <label for="publicidad">¿Desea recibir publicidad?</label>
        <input type="radio" name="publicidad" value="sí" <?php echo ($publicidad == 'sí') ? 'checked' : ''; ?>> Sí
        <input type="radio" name="publicidad" value="no" <?php echo ($publicidad == 'no') ? 'checked' : ''; ?>> No
        <br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Preferencia actual:</h2>
    <p>¿Recibe publicidad? <?php echo $publicidad; ?></p>

    <h2>Preferencia anterior (cookies):</h2>
    <p>Preferencia anterior: <?php echo isset($_COOKIE['publicidad']) ? $_COOKIE['publicidad'] : 'Ninguna'; ?></p>
</body>
</html>

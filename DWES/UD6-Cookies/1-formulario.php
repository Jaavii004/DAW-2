<?php

/**
 * @Author: Javier Puertas
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar los datos en cookies
    setcookie("usuario", $_POST['nombre'], time() + 3600);
    setcookie("saludo", $_POST['saludo'], time() + 3600);
}

// Obtener datos de cookies
$usuario = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : 'Nadie';
$saludo = isset($_COOKIE['saludo']) ? $_COOKIE['saludo'] : 'Ninguno';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Cookies</title>
</head>
<body>
    <h1>Formulario de Saludo o Despedida</h1>
    
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="saludo">Elige un saludo o despedida:</label>
        <select name="saludo" required>
            <option value="Saludo">Saludo</option>
            <option value="Despedida">Despedida</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Valores actuales:</h2>
    <p>Usuario actual: <?php echo $usuario; ?></p>
    <p>Acción elegida: <?php echo $saludo; ?></p>

    <h2>Valores anteriores (cookies):</h2>
    <p>Usuario anterior: <?php echo isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : 'Ninguno'; ?></p>
    <p>Acción anterior: <?php echo isset($_COOKIE['saludo']) ? $_COOKIE['saludo'] : 'Ninguna'; ?></p>
</body>
</html>

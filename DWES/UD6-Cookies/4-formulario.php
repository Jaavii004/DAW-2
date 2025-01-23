<?php

/**
 * @Author: Javier Puertas
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar el día de la semana y la quincena en cookies
    setcookie("dia", $_POST['dia'], time() + 3600);
    $quincena = (in_array($_POST['dia'], ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"])) ? "Primera" : "Segunda";
    setcookie("quincena", $quincena, time() + 3600);
}

// Obtener datos de cookies
$dia = isset($_COOKIE['dia']) ? $_COOKIE['dia'] : '';
$quincena = isset($_COOKIE['quincena']) ? $_COOKIE['quincena'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 - Cookies</title>
</head>
<body>
    <h1>Formulario de Día y Quincena</h1>
    
    <form method="POST" action="">
        <label for="dia">Día de la semana:</label>
        <select name="dia">
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miércoles">Miércoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sábado">Sábado</option>
            <option value="Domingo">Domingo</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Datos actuales:</h2>
    <p>Día: <?php echo $dia; ?></p>
    <p>Quincena: <?php echo $quincena; ?></p>

    <h2>Datos anteriores (cookies):</h2>
    <p>Día anterior: <?php echo isset($_COOKIE['dia']) ? $_COOKIE['dia'] : 'Ninguno'; ?></p>
    <p>Quincena anterior: <?php echo isset($_COOKIE['quincena']) ? $_COOKIE['quincena'] : 'Ninguna'; ?></p>
</body>
</html>

<?php
/**
 * @Author: Javier Puertas
 */

// 21. Realiza un programa donde el usuario seleccione una zona horaria de un máximo de 20 y le
// muestre la hora actual de dicha zona horaria.

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hora en Zona Horaria</title>
</head>
<body>
    <h1>Selecciona una zona horaria</h1>
    <form method="post">
        <label for="zona">Zona Horaria:</label>
        <select name="zona" required>
            <option value="America/New_York">Nueva York</option>
            <option value="America/Los_Angeles">Los Ángeles</option>
            <option value="Europe/London">Londres</option>
            <option value="Europe/Madrid">Madrid</option>
            <option value="Asia/Tokyo">Tokio</option>
            <option value="Asia/Shanghai">Shanghái</option>
            <option value="Australia/Sydney">Sídney</option>
            <option value="Africa/Johannesburg">Johannesburgo</option>
            <option value="Europe/Paris">París</option>
            <option value="America/Mexico_City">Ciudad de México</option>
            <option value="Europe/Rome">Roma</option>
            <option value="America/Sao_Paulo">São Paulo</option>
            <option value="Asia/Dubai">Dubái</option>
            <option value="Asia/Seoul">Seúl</option>
            <option value="Europe/Berlin">Berlín</option>
            <option value="Europe/Moscow">Moscú</option>
            <option value="Africa/Cairo">El Cairo</option>
            <option value="America/Argentina/Buenos_Aires">Buenos Aires</option>
            <option value="Asia/Delhi">Delhi</option>
            <option value="America/Chicago">Chicago</option>
        </select>
        <br><br>
        <input type="submit" value="Mostrar hora">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $zona_seleccionada = $_POST['zona'];
        date_default_timezone_set($zona_seleccionada);
        $hora_actual = date("H:i:s");
        echo "<p>La hora actual en " . $zona_seleccionada . " es: <strong>$hora_actual</strong></p>";
    }
    ?>
</body>
</html>

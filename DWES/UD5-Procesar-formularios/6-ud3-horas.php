<?php

/**
 * @Author: Javier Puertas
 */

// Ejercicio 4: Elabora un programa para determinar si una hora leída en la forma horas, minutos
// y segundos está correctamente expresada. Utiliza funciones para la comprobación de datos

//determinar si una hora leída en la forma horas, minutos y segundos está correctamente expresada
function esHoraValida($horas, $minutos, $segundos) {
    return ($horas >= 0 && $horas <= 23) && ($minutos >= 0 && $minutos <= 59) && ($segundos >= 0 && $segundos <= 59);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar de Hora</title>
</head>
<body>
    <h1>Validar de Hora</h1>
    <form method="post" action="6-ud3-horas.php">
        <label for="horas">Horas (0-23):</label>
        <input type="text" name="horas" required>
        <br>
        <label for="minutos">Minutos (0-59):</label>
        <input type="text" name="minutos" required>
        <br>
        <label for="segundos">Segundos (0-59):</label>
        <input type="text" name="segundos" required>
        <br>
        <input type="submit" value="Verificar Hora">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $horas = $_POST['horas'];
        $minutos = $_POST['minutos'];
        $segundos = $_POST['segundos'];

        
        if (is_numeric($horas) && is_numeric($minutos) && is_numeric($segundos)) {
            if (esHoraValida($horas, $minutos, $segundos)) {
                echo "<h2>Resultado:</h2><p>La hora es válida.</p>";
            } else {
                echo "<h2>Resultado:</h2><p>La hora no es válida.</p>";
            }
        } else {
            echo "<h2>Resultado:</h2><p>Los valores ingresados no son números.</p>";
        }
    }
    ?>
</body>

</html>
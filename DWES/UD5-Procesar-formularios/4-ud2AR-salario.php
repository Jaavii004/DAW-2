<?php

/**
 * @Author: Javier Puertas
 */

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Salario Semanal</title>
</head>
<body>
    <h1>Cálculo de Salario Semanal</h1>
    <form method="post" action="4-ud2AR-salario.php">
        <label for="horas">Ingrese las horas trabajadas esta semana:</label>
        <input type="text" name="horas" required>
        <input type="submit" value="Calcular Salario">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $horas = $_POST['horas'];

        // Tarifas
        $tarifa_normal = 12; // euros por hora
        $tarifa_extra = 16;  // euros por hora
        $horas_normales = 40;

        // Cálculo del salario
        if ($horas <= $horas_normales) {
            $salario = $horas * $tarifa_normal;
        } else {
            $horas_extra = $horas - $horas_normales;
            $salario = ($horas_normales * $tarifa_normal) + ($horas_extra * $tarifa_extra);
        }

        echo "<h2>Salario Semanal: " . number_format($salario, 2) . "€</h2>";
    }
    ?>
</body>
</html>

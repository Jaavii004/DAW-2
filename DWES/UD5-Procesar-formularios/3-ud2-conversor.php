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
    <title>Calculadora de Euros y Pesetas</title>
</head>
<body>
    <h1>Calculadora de Conversión</h1>
    <form method="post">
        <label for="cantidad">Ingrese la cantidad:</label>
        <input type="text" name="cantidad" required>
        <br><br>
        <label for="tipo_conversion">Seleccione la conversión:</label>
        <select name="tipo_conversion" required>
            <option value="euros_a_pesetas">Euros a Pesetas</option>
            <option value="pesetas_a_euros">Pesetas a Euros</option>
        </select>

        <input type="submit" value="Convertir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cantidad = $_POST['cantidad'];

        if (!is_numeric($cantidad)) {
            echo "<p>Por favor, ingrese un número válido.</p>";
        } else {
            $tipo_conversion = $_POST['tipo_conversion'];
            $valor_peseta = 166.386;
    
            if ($tipo_conversion == "euros_a_pesetas") {
                $resultado = $cantidad * $valor_peseta;
                echo "<p>$cantidad euros son " . number_format($resultado, 2) . " pesetas.</p>";
            } elseif ($tipo_conversion == "pesetas_a_euros") {
                $resultado = $cantidad / $valor_peseta;
                echo "<p>$cantidad pesetas son " . number_format($resultado, 2) . " euros.</p>";
            }
        }
    }
    ?>
</body>
</html>

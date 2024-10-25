<?php
/**
 * @Author: Javier Puertas
 */

// Ejercicio 5 Diseña un programa que determine la cantidad total a pagar por 5 llamadas
// telefónicas de duración a introducir por el usuario de acuerdo a las siguientes premisas: Toda
// llamada que dure menos de 3 minutos tiene un coste de 10 céntimos. Cada minuto adicional a
// partir de los 3 primeros es un paso de contador y cuesta 5 céntimos.

function calcularCosteLlamada($duracion) {
    if ($duracion < 3) {
        return 0.10; // 10 céntimos
    } else {
        return 0.10 + ($duracion - 3) * 0.05; // 5 céntimos por cada minuto adicional
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador de Coste de Llamadas</title>
</head>

<body>
    <h1>Calculador de Coste de Llamadas</h1>
    <form method="post" action="">
        <h2>Introduce la duración de 5 llamadas (en minutos):</h2>
        
        <label for="duracion1">Llamada 1:</label>
        <input type="text" name="duraciones[]" required>
        <br>
        
        <label for="duracion2">Llamada 2:</label>
        <input type="text" name="duraciones[]" required>
        <br>
        
        <label for="duracion3">Llamada 3:</label>
        <input type="text" name="duraciones[]" required>
        <br>
        
        <label for="duracion4">Llamada 4:</label>
        <input type="text" name="duraciones[]" required>
        <br>
        
        <label for="duracion5">Llamada 5:</label>
        <input type="text" name="duraciones[]" required>
        <br>
        <input type="submit" value="Calcular Coste">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $duraciones = $_POST['duraciones'];
        $total = 0;

        foreach ($duraciones as $duracion) {
            $total += calcularCosteLlamada($duracion);
        }

        echo "<h2>Resultado:</h2>";
        echo "<p>El coste total de las llamadas es de " . number_format($total, 2) . "€</p>";
    }
    ?>
</body>

</html>

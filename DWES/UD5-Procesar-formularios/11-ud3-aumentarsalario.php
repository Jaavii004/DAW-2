<?php
/**
 * @Author: Javier Puertas
 * 
 * 11. Ejercicio 24 Con los trabajadores del ejercicio anterior, calcular el salario actual y el salario
 * aumentado un porcentaje indicado por el usuario
 */

$trabajadores = [
    "Carlos" => 2500,
    "María" => 3200,
    "Juan" => 1800,
    "Ana" => 2900,
    "Luis" => 2100
];

function calcularSalarioAumentado($salario, $porcentaje) {
    return $salario * (1 + $porcentaje / 100);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Salario Aumentado</title>
</head>

<body>
    <h1>Cálculo de Salario Aumentado</h1>
    <form method="post">
        <label for="porcentaje">Porcentaje de aumento:</label>
        <input type="text" name="porcentaje" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $porcentaje = $_POST['porcentaje'];
        if (is_numeric($porcentaje)) {
            echo "<h2>Salarios con Aumento del $porcentaje%:</h2>";
            foreach ($trabajadores as $nombre => $salario) {
                echo "Trabajador: $nombre - Salario Actual: $salario - Salario con Aumento: " . calcularSalarioAumentado($salario, $porcentaje) . "<br>";
            }
        } else {
            echo "Porcentaje ingresado no es un valor numérico válido.<br>";
        }
    }
    ?>
</body>

</html>

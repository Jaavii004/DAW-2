<?php
/**
 * @Author: Javier Puertas
 */

// 10. Ejercicio 23 Dado un vector asociativo de trabajadores con su salario, crea usando funciones
// y a criterio del usuario, el salario máximo, el salario mínimo y el salario medio. (puede elegir uno
// de ellos, varios o todos)

$trabajadores = [
    "Carlos" => 2500,
    "María" => 3200,
    "Juan" => 1800,
    "Ana" => 2900,
    "Luis" => 2100
];

function salarioMaximo($trabajadores) {
    return max($trabajadores);
}

function salarioMinimo($trabajadores) {
    return min($trabajadores);
}

function salarioMedio($trabajadores) {
    return array_sum($trabajadores) / count($trabajadores);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Salarios</title>
</head>
<body>
    <h1>Cálculo de Salarios</h1>
    <form method="post">
        <label for="opciones">Seleccione el cálculo deseado:</label><br>
        <input type="checkbox" name="opciones[]" value="maximo"> Salario Máximo<br>
        <input type="checkbox" name="opciones[]" value="minimo"> Salario Mínimo<br>
        <input type="checkbox" name="opciones[]" value="medio"> Salario Medio<br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $opciones = $_POST['opciones'];

        echo "<h2>Resultados:</h2>";

        if (in_array("maximo", $opciones)) {
            echo "Salario Máximo: " . salarioMaximo($trabajadores) . "<br>";
        }

        if (in_array("minimo", $opciones)) {
            echo "Salario Mínimo: " . salarioMinimo($trabajadores) . "<br>";
        }

        if (in_array("medio", $opciones)) {
            echo "Salario Medio: " . number_format(salarioMedio($trabajadores), 2) . "<br>";
        }
    }
    ?>
</body>

</html>

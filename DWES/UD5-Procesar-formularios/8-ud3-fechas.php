<?php
/**
 * @Author: Javier Puertas
 */

// 8. Ejercicio 7 Calcula, dada dos fechas inicio y final introducidas por el usuario (puede ser la
// actual y otra deseada), cuántos días, horas y minutos hay de diferencia entre dichas horas

function calcularDiferencia($fechaInicio, $fechaFin) {
    $fechaInicioArray = explode('-', $fechaInicio);
    $fechaFinArray = explode('-', $fechaFin);

    $diaInicio = $fechaInicioArray[0];
    $mesInicio = $fechaInicioArray[1];
    $anioInicio = $fechaInicioArray[2];
    
    $diaFin = $fechaFinArray[0];
    $mesFin = $fechaFinArray[1];
    $anioFin = $fechaFinArray[2];

    // Calcular la diferencia en días
    $diasTotalesInicio = $anioInicio * 365 + $mesInicio * 30 + $diaInicio;
    $diasTotalesFin = $anioFin * 365 + $mesFin * 30 + $diaFin;
    
    $diferenciaDias = $diasTotalesFin - $diasTotalesInicio;

    // Asumiendo que cada día tiene 24 horas y 60 minutos
    $horas = ($diferenciaDias * 24) % 24;
    $minutos = ($diferenciaDias * 24 * 60) % 60;

    echo "Días: " . $diferenciaDias . ", ";
    echo "Horas: " . $horas . ", ";
    echo "Minutos: " . $minutos . ".";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Diferencia de Fechas</title>
</head>

<body>
    <h1>Cálculo de Diferencia de Fechas</h1>
    <form method="post" action="">
        <label for="fechaInicio">Fecha y hora de inicio (YYYY-MM-DD HH:MM:SS):</label>
        <input type="text" name="fechaInicio" required>
        <br>

        <label for="fechaFin">Fecha y hora de final (YYYY-MM-DD HH:MM:SS):</label>
        <input type="text" name="fechaFin" required>
        <br>

        <input type="submit" value="Calcular Diferencia">
    </form>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entradaInicio = $_POST['fechaInicio'];
        $entradaFin = $_POST['fechaFin'];

        echo "<h2>Resultado:</h2>";
        calcularDiferencia($fechaInicio, $fechaFin);
    }
    ?>
</body>

</html>

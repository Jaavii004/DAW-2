<?php

/**
 * @Author: Javier Puertas
 */

session_start();

// Recuperar los valores anteriores de la sesión
$numeros_anterior = isset($_SESSION['numeros']) ? $_SESSION['numeros'] : [];
$operacion_anterior = isset($_SESSION['operacion']) ? $_SESSION['operacion'] : 'Ninguna';
$resultado_anterior = isset($_SESSION['resultado']) ? $_SESSION['resultado'] : 'Ninguno';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los números y la operación del formulario
    $numeros = explode(',', $_POST['numeros']);
    $numeros = array_map('intval', $numeros); // Convertir a enteros
    $operacion = $_POST['operacion'];

    // Calcular el resultado según la operación seleccionada
    switch ($operacion) {
        case 'media':
            $resultado = array_sum($numeros) / count($numeros);
            break;
        case 'mediana':
            sort($numeros);
            $count = count($numeros);
            $mid = floor(($count - 1) / 2);
            $resultado = ($numeros[$mid] + $numeros[$mid + 1]) / 2;
            break;
        case 'moda':
            $frecuencias = array_count_values($numeros);
            arsort($frecuencias);
            $moda = array_key_first($frecuencias);
            $resultado = $moda;
            break;
        default:
            $resultado = 'Operación no válida';
    }

    // Guardar los valores actuales en la sesión
    $_SESSION['numeros'] = $numeros;
    $_SESSION['operacion'] = $operacion;
    $_SESSION['resultado'] = $resultado;

    // Actualizar los valores actuales para mostrar
    $numeros_actual = $numeros;
    $operacion_actual = $operacion;
    $resultado_actual = $resultado;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cálculo de Media, Mediana y Moda</title>
</head>

<body>
    <h1>Cálculo de Media, Mediana y Moda</h1>

    <form method="POST" action="">
        <label for="numeros">Ingresa números separados por comas:</label>
        <input type="text" name="numeros" required>
        <br>
        <label for="operacion">Selecciona una operación:</label>
        <select name="operacion" required>
            <option value="media">Media</option>
            <option value="mediana">Mediana</option>
            <option value="moda">Moda</option>
        </select>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <h2>Valores actuales:</h2>
    <p>Números actuales: <?php echo implode(', ', $numeros_actual); ?></p>
    <p>Operación actual: <?php echo $operacion_actual; ?></p>
    <p>Resultado actual: <?php echo $resultado_actual; ?></p>

    <h2>Valores anteriores (sesión):</h2>
    <p>Números anteriores: <?php echo implode(', ', $numeros_anterior); ?></p>
    <p>Operación anterior: <?php echo $operacion_anterior; ?></p>
    <p>Resultado anterior: <?php echo $resultado_anterior; ?></p>
</body>

</html>
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
    <title>Calculadora de Operaciones</title>
</head>

<body>
    <h1>Calculadora de Operaciones</h1>
    <form method="POST" action="">
        <label for="numero1">Número 1:</label>
        <input type="text" id="numero1" name="numero1" required><br>

        <label for="numero2">Número 2:</label>
        <input type="text" id="numero2" name="numero2" required>

        <h3>Selecciona las operaciones a realizar:</h3>
        <select name="operaciones[]" multiple required>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="division">División</option>
            <option value="multiplicacion">Multiplicación</option>
        </select><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    // Función para validar si un valor es un número entero
    function esNumeroEntero($valor)
    {
        return ctype_digit($valor);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operaciones = isset($_POST['operaciones']) ? $_POST['operaciones'] : [];

        // Validar que ambos números son enteros
        if (!esNumeroEntero($numero1) || !esNumeroEntero($numero2)) {
            echo "Ambos valores deben ser números enteros.";
        } else {
            // Realizar operaciones seleccionadas
            foreach ($operaciones as $opcion) {
                switch ($opcion) {
                    case 'suma':
                        echo "Suma: $numero1 + $numero2 = " . ($numero1 + $numero2) . "<br>";
                        break;
                    case 'resta':
                        echo "Resta: $numero1 - $numero2 = " . ($numero1 - $numero2) . "<br>";
                        break;
                    case 'division':
                        if ($numero2 != 0) {
                            echo "División: $numero1 / $numero2 = " . ($numero1 / $numero2) . "<br>";
                        } else {
                            echo "Error: División por cero no está permitida.<br>";
                        }
                        break;
                    case 'multiplicacion':
                        echo "Multiplicación: $numero1 * $numero2 = " . ($numero1 * $numero2) . "<br>";
                        break;
                    default:
                        echo "Opción no válida: $opcion<br>";
                }
            }
        }
    }
    ?>
</body>

</html>

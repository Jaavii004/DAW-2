<?php

/**
 * @Author: Javier Puertas
 */

// 9. Ejercicio 8. Crea la tabla de multiplicar de un número indicado por el usuario siendo que el
// multiplicador se podrá seleccionar entre 1 y 10. Se multiplicará desde 1 al multiplicador
// seleccionado
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
</head>

<body>
    <h1>Generador de Tabla de Multiplicar</h1>
    <form method="post" action="">
        <label for="numero">Número a multiplicar:</label>
        <input type="text" name="numero" required>
        <br>

        <label for="multiplicador">Multiplicador máximo (1-10):</label>
        <input type="text" name="multiplicador" required>
        <br>

        <input type="submit" value="Generar Tabla">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['numero'];
        $multiplicador = $_POST['multiplicador'];

        echo "<h2>Tabla del $numero hasta $multiplicador:</h2>";
        echo "<ul>";
        for ($i = 1; $i <= $multiplicador; $i++) {
            $resultado = $numero * $i;
            echo "<li>$numero x $i = $resultado</li>";
        }
        echo "</ul>";
    }
    ?>
</body>

</html>

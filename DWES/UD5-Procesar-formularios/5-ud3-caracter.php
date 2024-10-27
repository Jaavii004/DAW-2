<?php

/**
 * @Author: Javier Puertas
 */

// 5. Ejercicio 1: Elabora un programa que dado un carácter introducido por el usuario y determine
// si es:
// 1. una letra mayúscula 4. un carácter blanco
// 2. una letra minúscula 5. un carácter de puntuación
// 3. un carácter numérico 6. un carácter especial
// Se debe usar funciones para la comprobación de datos

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clasificador de Caracteres</title>
</head>

<body>
    <h1>Clasificador de Caracteres</h1>
    <form method="post" action="5-ud3-caracter.php">
        <label for="caracter">Introduce un carácter:</label>
        <input type="text" name="caracter" required>
        <input type="submit" value="Clasificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $caracter = $_POST['caracter'];
        if (strlen($caracter) !== 1) {
            echo "Por favor, introduce un solo carácter.";
        } else {
            if (is_numeric($caracter)) {
                echo "Es un carácter numérico";
            } elseif (ctype_upper($caracter)) {
                echo "Es una letra mayúscula";
            } elseif (ctype_lower($caracter)) {
                echo "Es una letra minúscula";
            } elseif (ctype_punct($caracter)) {
                echo "Es un carácter de puntuación";
            } elseif (ctype_space($caracter)) {
                echo "Es un carácter blanco";
            } else {
                echo "Es un carácter especial";
            }
        }
    }
    ?>
</body>

</html>
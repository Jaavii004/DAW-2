<?php

/**
 * @Author: Javier Puertas
 */

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
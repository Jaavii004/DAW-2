<?php
/**
 * @Author: Javier Puertas
 */

// 18. Escribe un programa para que, a criterio del usuario, obtenga la media, la moda (número más
// frecuente) o la mediana (el número de en medio o el promedio de los dos centrales si son pares)
// de los números que introduzca el usuario. Se podrán seleccionar de una a todas las opciones
// calculadas pero se deben mostrar todas para que el usuario las marque o desmarque.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Media, Moda y Mediana</title>
</head>

<body>
    <h1>Cálculo de Media, Moda y Mediana</h1>
    <form method="post">
        <label for="numeros">Introduce números separados por comas:</label><br>
        <input type="text" name="numeros" required><br><br>

        <input type="checkbox" name="media" id="media">
        <label for="media">Calcular Media</label><br>

        <input type="checkbox" name="moda" id="moda">
        <label for="moda">Calcular Moda</label><br>

        <input type="checkbox" name="mediana" id="mediana">
        <label for="mediana">Calcular Mediana</label><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener números de entrada
        $entrada = $_POST['numeros'];
        $numeros = explode(',', $entrada);

        $numeros = array_map('trim', $numeros);
        $numeros = array_filter($numeros, 'is_numeric');

        // Mostrar resultados
        echo "<h2>Resultados:</h2>";

        // Calcular media
        if (isset($_POST['media'])) {
            $suma = 0;
            foreach ($numeros as $numero) {
                $suma += $numero;
            }
            $media = $suma / count($numeros);
            echo "<p>Media: $media</p>";
        }

        // Calcular moda
        if (isset($_POST['moda'])) {
            $frecuencia = [];
            foreach ($numeros as $numero) {
                if (isset($frecuencia[$numero])) {
                    $frecuencia[$numero]++;
                } else {
                    $frecuencia[$numero] = 1;
                }
            }
            $moda = array_keys($frecuencia, max($frecuencia));
            echo "<p>Moda: " . implode(', ', $moda) . "</p>";
        }

        // Calcular mediana
        if (isset($_POST['mediana'])) {
            sort($numeros);
            $cantidad = count($numeros);
            if ($cantidad % 2 == 1) {
                $mediana = $numeros[floor($cantidad / 2)];
            } else {
                $mediana = ($numeros[$cantidad / 2 - 1] + $numeros[$cantidad / 2]) / 2;
            }
            echo "<p>Mediana: $mediana</p>";
        }
    }
    ?>
</body>

</html>

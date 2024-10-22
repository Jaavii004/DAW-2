<?php

/**
 * @Author: Javier Puertas
 */

// Crear un programa para introducir números por teclado mientras su suma no alcance o iguale a
// 1000. Cuando ésto ocurra, debes mostrar los números introducidos, cuántos son, el total de la
// suma y la media de todos ellos.

$numeros = [];
$suma = 0;

// si la suma da mas de 1000 salimos del bucle
while ($suma < 1000) {
    $numero = readline("Introduce un número: ");

    $numeros[] = $numero;
    $suma += $numero;
}

$media = $suma / count($numeros);

echo "Números introducidos: " . implode(", ", $numeros) . "\n";
echo "Total de números: " . count($numeros) . "\n";
echo "Suma: " . $suma . "\n";
echo "Media: " . $media . "\n";

?>
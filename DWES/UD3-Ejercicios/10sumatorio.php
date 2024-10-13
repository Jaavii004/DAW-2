<?php

/**
 * @Author: Javier Puertas
 */

// Genera un número entre 1 y 20 y calcula su sumatorio. Nota: El sumatorio de un número es la
// suma de él mismo con sus anteriores. Ejemplo ∑3=3+2+1=6

$numero = rand(1, 20);

$suma = 0;
for ($i = 1; $i <= $numero; $i++) {
    $suma += $i;
}

echo "Sumatorio de " . $numero . " es: " . $suma;

echo "\n";

?>
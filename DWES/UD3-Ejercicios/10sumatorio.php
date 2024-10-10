<?php

/**
 * @Author: Javier Puertas
 */

$numero = rand(1, 20);

$suma = 0;
for ($i = 1; $i <= $numero; $i++) {
    $suma += $i;
}

echo "Sumatorio de " . $numero . " es: " . $suma;

echo "\n";

?>
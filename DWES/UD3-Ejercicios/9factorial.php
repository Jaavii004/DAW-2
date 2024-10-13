<?php

/**
 * @Author: Javier Puertas
 */

// Genera un número entre 1 y 15 y calcula su factorial. Nota: El factorial de un número es la
// multiplicación de él mismo con sus anteriores. Ejemplo 3!=3*2*1=6 

$number = rand(1, 15);
$factorial = 1;

for ($i = $number; $i >= 1; $i--) {
    $factorial *= $i;
}

echo "El factorial de $number es $factorial \n";

?>
<?php

/**
 * @Author: Javier Puertas
 */

$number = rand(1, 15);
$factorial = 1;

for ($i = $number; $i >= 1; $i--) {
    $factorial *= $i;
}

echo "El factorial de $number es $factorial \n";

?>
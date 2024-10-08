<?php

/**
 * @Author: Javier Puertas
 */

$number = readline("Enter un numero: ");
$factorial = 1;

for ($i = $number; $i >= 1; $i--) {
    $factorial *= $i;
}

echo "El factorial de $number es $factorial";

?>
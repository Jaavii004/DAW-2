<?php

/**
 * @Author: Javier Puertas
 */


$a = readline("Numero A: ");
$b = readline("Numero B: ");

$result = 1;
for ($i = 0; $i < $b; $i++) {
    $result *= $a;
}

echo "El resultado de A elevado a B es de " . $result;

echo "\n";

?>
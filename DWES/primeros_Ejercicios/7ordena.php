<?php

/**
 * @Author: Javier Puertas
 */

$numeros = readline("Dime números separados por coma: ");

$numbers = explode(",", $numeros);
rsort($numbers);

echo "Los números ordenados de mayor a menor son: " . implode(", ", $numbers). "\n";

?>
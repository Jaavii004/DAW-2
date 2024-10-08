<?php

/**
 * @Author: Javier Puertas
 */

$numeros = array();

for ($i = 0; $i < 3; $i++) {
    $num = readline("Introduce un número: ");
    array_push($numeros, $num);
}

$counts = array_count_values($numeros);

$max_count = max($counts);

switch ($max_count) {
    case 3:
        echo "Hay tres números iguales a " . array_search(3, $counts) . ".\n";
        break;
    case 2:
        echo "Hay dos números iguales a " . array_search(2, $counts) . ".\n";
        break;
    default:
        echo "No hay números iguales.\n";
}

?>

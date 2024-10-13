<?php

/**
 * @Author: Javier Puertas
 */

// Escribe un programa que lea tres números positivos y compruebe si son iguales. Por ejemplo:
//  * Si la entrada fuese 5 5 5, la salida debería ser “hay tres números iguales a 5“.
//  * Si la entrada fuese 4 6 4, la salida debería ser “hay dos números iguales a 4“.
//  * Si la entrada fuese 0 1 2, la salida debería ser “no hay números iguales“


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

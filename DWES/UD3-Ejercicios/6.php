<?php

/**
 * @Author: Javier Puertas
 */

$numeros = array();

// Recolectar los 3 números ingresados por el usuario
for ($i = 0; $i < 3; $i++) {
    $num = readline("Introduce un número: ");
    array_push($numeros, $num);
}

// Contar cuántas veces se repite cada número en el array
$counts = array_count_values($numeros);

// Obtener el número de repeticiones máximo
$max_count = max($counts);

switch ($max_count) {
    case 3:
        // Buscar el número que se repite 3 veces
        echo "Hay tres números iguales a " . array_search(3, $counts) . ".\n";
        break;
    case 2:
        // Buscar el número que se repite 2 veces
        echo "Hay dos números iguales a " . array_search(2, $counts) . ".\n";
        break;
    default:
        echo "No hay números iguales.\n";
}

?>

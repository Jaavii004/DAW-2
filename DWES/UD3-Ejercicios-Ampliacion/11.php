<?php

/**
 * @Author: Javier Puertas
 */

// Crear y rellenar una tabla de tamaño 10x10, mostrar la suma de cada fila y de cada columna

// Crear y rellenar una tabla de tamaño 10x10
$table = array();
for ($i = 0; $i < 10; $i++) {
    $row = array();
    for ($j = 0; $j < 10; $j++) {
        $row[] = rand(1, 100); // Rellenar con números aleatorios entre 1 y 100
    }
    $table[] = $row;
}

// Mostrar la suma de cada fila
foreach ($table as $row) {
    $sum = array_sum($row);
    echo "Suma de la fila: $sum\n";
}

// Mostrar la suma de cada columna
for ($i = 0; $i < 10; $i++) {
    $sum = 0;
    for ($j = 0; $j < 10; $j++) {
        $sum += $table[$j][$i];
    }
    echo "Suma de la columna: $sum\n";
}
// Mostrar la suma de cada columna en español
for ($i = 0; $i < 10; $i++) {
    $sum = 0;
    for ($j = 0; $j < 10; $j++) {
        $sum += $table[$j][$i];
    }
    echo "Suma de la columna $i: $sum\n";
}


?>
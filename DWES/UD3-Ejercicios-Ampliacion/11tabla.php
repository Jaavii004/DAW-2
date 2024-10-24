<?php

/**
 * @Author: Javier Puertas
 */

// Crear y rellenar una tabla de tamaño 10x10, mostrar la suma de cada fila y de cada columna

// Crear y rellenar una tabla de tamaño 10x10
$tabla = array();
for ($i = 0; $i < 10; $i++) {
    $fila = array();
    for ($j = 0; $j < 10; $j++) {
        $fila[] = rand(1, 100);
    }
    $tabla[] = $fila;
}

for ($i = 0; $i < 10; $i++) {
    $suma = 0;
    for ($j = 0; $j < 10; $j++) {
        $suma += $tabla[$j][$i];
    }
    echo "Suma de la columna $i: $suma\n";
}


?>
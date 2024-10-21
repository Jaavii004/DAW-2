<?php

/**
 * @Author: Javier Puertas
 */

// Crear una matriz de tamaño 5x5 y rellenarla de la siguiente forma: la posición M[n,m] debe
// contener n+m. Después se debe mostrar su contenido.

// Definimos el tamaño de la matriz
$fila = 5;
$columna = 5;

// Creamos la matriz
$matriz = [];

// Rellenamos la matriz
for ($n = 0; $n < $fila; $n++) {
    for ($m = 0; $m < $columna; $m++) {
        $matriz[$n][$m] = $n + $m;
    }
}

// Mostramos la matriz
echo "Contenido de la matriz:\n";
for ($n = 0; $n < $fila; $n++) {
    for ($m = 0; $m < $columna; $m++) {
        // t es tabulador
        echo $matriz[$n][$m] . "\t";
    }
    echo "\n";
}

?>
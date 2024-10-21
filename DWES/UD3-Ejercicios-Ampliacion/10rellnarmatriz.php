<?php

/**
 * @Author: Javier Puertas
 */

// Crear y rellenar por teclado dos matrices de tamaño 3x3, sumarlas y mostrar su suma.

// Definimos el tamaño de las matrices
$fila = 3;
$columna = 3;

// Creamos las matrices
$matrizA = [];
$matrizB = [];
$matrizSuma = [];

// Rellenamos la primera matriz
echo "Introduce los elementos de la matriz A (3x3):\n";
for ($i = 0; $i < $fila; $i++) {
    for ($j = 0; $j < $columna; $j++) {
        $numero = readline("Elemento A[$i][$j]: ");
        $matrizA[$i][$j] = $numero;
    }
}

// Rellenamos la segunda matriz
echo "\nIntroduce los elementos de la matriz B (3x3):\n";
for ($i = 0; $i < $fila; $i++) {
    for ($j = 0; $j < $columna; $j++) {
        $numero = readline("Elemento B[$i][$j]: ");
        $matrizB[$i][$j] = $numero;
    }
}

// Sumamos las matrices
for ($i = 0; $i < $fila; $i++) {
    for ($j = 0; $j < $columna; $j++) {
        $matrizSuma[$i][$j] = $matrizA[$i][$j] + $matrizB[$i][$j];
    }
}

// Mostramos la matriz suma
echo "\nLa suma de las matrices A y B es:\n";
for ($i = 0; $i < $fila; $i++) {
    for ($j = 0; $j < $columna; $j++) {
        echo $matrizSuma[$i][$j] . "\t"; // Usamos tabulación para mejor formato
    }
    echo "\n"; // Nueva línea al final de cada fila
}

?>
<?php

/**
 * @Author: Javier Puertas
 */

// Leer por teclado y rellenar dos vectores de 10 números enteros y mezclarlos en un tercer vector
// de la forma: el 1º de A, el 1º de B, el 2º de A, el 2º de B, etc.

// Inicializamos los vectores
$vectorA = [];
$vectorB = [];
$vectorMezclado = [];

// Rellenamos el primer vector
echo "Introduce 10 números enteros para el primer vector (A):\n";
for ($i = 0; $i < 10; $i++) {
    $numero = (int)readline("Número " . ($i + 1) . ": ");
    $vectorA[] = $numero;
}

// Rellenamos el segundo vector
echo "\nIntroduce 10 números enteros para el segundo vector (B):\n";
for ($i = 0; $i < 10; $i++) {
    $numero = (int)readline("Número " . ($i + 1) . ": ");
    $vectorB[] = $numero;
}

// Mezclamos los vectores en el tercer vector
for ($i = 0; $i < 10; $i++) {
    $vectorMezclado[] = $vectorA[$i];
    $vectorMezclado[] = $vectorB[$i];
}

// Mostramos el vector mezclado
echo "\nVector mezclado:\n";
foreach ($vectorMezclado as $numero) {
    echo $numero . " ";
}
echo "\n";

?>
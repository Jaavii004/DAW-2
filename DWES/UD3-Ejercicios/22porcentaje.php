<?php

/**
 * @Author: Javier Puertas
 */

// Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y
// cuántos son negativos (muestra los números, la cantidad de positivos y negativos y el porcentaje
// de cada grupo)

// Lista de números
$lista = [1, 2, 3, 4, 5, -1, -2, -3, -4, -5];

// Valores a 0
$positivos = 0;
$negativos = 0;

// Recorremos la lista y comprobamos si es positivo o negativo
for ($i=0; $i < count($lista); $i++) { 
    if ($lista[$i] > 0) {
        $positivos++;
    } else {
        $negativos++;
    }
}

echo "Lista de números: ";
print_r($lista);

// Calculamos el porcentaje de positivos y negativos
$porcentaje_positivos = ($positivos / count($lista)) * 100;
$porcentaje_negativos = ($negativos / count($lista)) * 100;

echo "Cantidad de números positivos: " . $positivos . " y son un " . $porcentaje_positivos . "%\n";
echo "Cantidad de números negativos: " . $negativos . " y son un " . $porcentaje_negativos . "%\n";

?>
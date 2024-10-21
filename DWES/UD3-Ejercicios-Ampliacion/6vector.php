<?php

/**
 * @Author: Javier Puertas
 */

// Realiza un programa que pida 8 números enteros, los almacene en un vector junto con la
// palabra “par” o “impar” según proceda y los muestre. Además debe indicar la cantidad de
// números en cada caso y el porcentaje de pares e impares.

echo "Ingrese 8 números enteros:\n";

$numeros = [];

$contadorPares = 0;
$contadorImpares = 0;

for ($i = 1; $i <= 8; $i++) {
    // pedir numero
    $numero = readline("Número $i: ");
    
    if (ctype_digit($numero)) {
        // Saber si es par o no
        if ($numero % 2 == 0) {
            $numeros[] = ["numero" => $numero, "tipo" => "par"];
            $contadorPares++;
        } else {
            $numeros[] = ["numero" => $numero, "tipo" => "impar"];
            $contadorImpares++;
        }
    } else {
        // si no es un numero entero
        echo "No es un numero entero\n";
        $i--;
    }
}

$totalNumeros = $contadorPares + $contadorImpares;
$porcentajePares = ($contadorPares / $totalNumeros) * 100;
$porcentajeImpares = ($contadorImpares / $totalNumeros) * 100;

echo "Números y sus tipos:\n";
foreach ($numeros as $numero) {
    echo "{$numero['numero']} ({$numero['tipo']})\n";
}

echo "Números pares: $contadorPares ($porcentajePares%)\n";
echo "Números impares: $contadorImpares ($porcentajeImpares%)\n";


?>
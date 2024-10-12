<?php

/**
 * @Author: Javier Puertas
 */

// Escribe una función que calcule todas las potencias de un número hasta llegar al exponente
// indicado, las almacene en un vector y muestre el resultado de cada potencia indicando además
// la suma de todas las potencias incluyendo la del exponente indicado.

function calcularPotencias($numero, $exponente) {
    $potencias = [];

    for ($i = 1; $i <= $exponente; $i++) {
        $potencia = $numero ** $i;
        array_push($potencias, $potencia);
    }

    echo "Potencias: ";
    print_r($potencias);
    echo "\n Suma de todas las potencias: " . array_sum($potencias) . "\n";
}

$numero = readline("Ingrese un número: ");
$exponente = readline("Ingrese un exponente: ");

calcularPotencias($numero, $exponente);

?>
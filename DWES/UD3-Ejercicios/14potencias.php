<?php

/**
 * @Author: Javier Puertas
 */


// Escribe una función que calcule todas las potencias de un número hasta llegar al exponente
// indicado, las almacene en un vector y muestre el resultado de cada potencia indicando además
// la suma de todas las potencias incluyendo la del exponente indicado.


function calcularPotencias($numero, $exponente) {
    $potencias = [];
    $suma = 0;

    for ($i = 0; $i <= $exponente; $i++) {
        $potencia = $numero ** $i;
        $potencias[] = $potencia;
        $suma += $potencia;
        echo "Potencia de $numero elevado a $i: $potencia\n";
    }

    echo "Suma de todas las potencias: $suma\n";
}

$numero = readline("Ingrese un número: ");
$exponente = readline("Ingrese un exponente: ");

calcularPotencias($numero, $exponente);

?>
<?php

/**
 * @Author: Javier Puertas
 */


// Dado un vector asociativo de trabajadores con su salario creado solicitando al usuario el nombre
// y salario de cada trabajador, crea usando funciones el salario máximo, el salario mínimo y el
// salario medio

function calcularSalarioMaximo($trabajadores) {
    return max($trabajadores);
}

function calcularSalarioMinimo($trabajadores) {
    return min($trabajadores);
}

function calcularSalarioMedio($trabajadores) {
    $totalSalario = array_sum($trabajadores);
    $numTrabajadores = count($trabajadores);
    return $totalSalario / $numTrabajadores;
}

$trabajadores = array();

$N_trabajadores = readline("Cuantos trabajadores quieres: ");

for ($i = 0; $i < $N_trabajadores; $i++) {
    $nombre = readline("Nombre del trabajador: ");
    $salario = readline("Salario del trabajador: ");
    $trabajadores[$nombre] = $salario;
}

$salarioMaximo = calcularSalarioMaximo($trabajadores);

$salarioMinimo = calcularSalarioMinimo($trabajadores);

$salarioMedio = calcularSalarioMedio($trabajadores);

echo "Salario máximo: " . $salarioMaximo . "\n";
echo "Salario mínimo: " . $salarioMinimo . "\n";
echo "Salario medio: " . $salarioMedio . "\n";

?>
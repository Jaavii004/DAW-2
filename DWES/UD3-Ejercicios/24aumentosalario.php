<?php

/**
 * @Author: Javier Puertas
 */

// Con los trabajadores del ejercicio anterior, calcular el salario actual y el salario aumentado un
// porcentaje indicado por la variable

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

$porcentajeAumento = readline("Porcentaje de aumento: ");

function calcularSalarioAumentado($salario, $porcentajeAumento) {
    $aumento = $salario * ($porcentajeAumento / 100);
    return $salario + $aumento;
}
foreach ($trabajadores as $nombre => $salario) {
    echo "Salario actualizado de " . $nombre . ": " . calcularSalarioAumentado($salario, $porcentajeAumento) . "\n";
}

?>
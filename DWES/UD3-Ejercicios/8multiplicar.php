<?php

/**
 * @Author: Javier Puertas
 */

// Crea la tabla de multiplicar a partir de un número

$numero = readline("Ingrese un número: ");

if (!is_numeric($numero)) {
    echo "Entrada inválida. Por favor, ingrese un número válido.";
    exit;
}

$numeroHastaLlegar = readline("Hasta cual quieres llegar: ");

echo "Tabla de multiplicar para $numero:\n";
echo "-----------------------------\n";

for ($i = 1; $i <= $numeroHastaLlegar; $i++) {
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado\n";
}

?>
<?php

/**
 * @Author: Javier Puertas
 */

// Escribe un programa que dada una nota (entera) indique su correspondencia en el boletín
// (Ejemplo 5 sería SUFICIENTE)

$notas = [];
$total = 0;

for ($i = 1; $i <= 7; $i++) {
    $nota = readline("Dime la nota $i: ");
    $notas[] = $nota;
    $total += $nota;
}

$media = $total / 7;

if ($media >= 9) {
    echo "Media: $media - SOBR+SALIENTE";
} elseif ($media >= 7) {
    echo "Media: $media - NOTABLE";
} elseif ($media >= 6) {
    echo "Media: $media - BIEN";
} elseif ($media >= 5) {
    echo "Media: $media - SUFICIENTE";
} else {
    echo "Media: $media - INSUFICIENTE";
}

echo "\n";

?>
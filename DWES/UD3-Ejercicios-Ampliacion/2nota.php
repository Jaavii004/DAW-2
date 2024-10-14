<?php

/**
 * @Author: Javier Puertas
 */

// Escribe un programa que dada una nota (entera) indique su correspondencia en el boletín
// (Ejemplo 5 sería SUFICIENTE)

$nota = readline("Dime tu nota: ");

if ($nota >= 9) {
    echo "SOBRESALIENTE";
} elseif ($nota >= 7) {
    echo "NOTABLE";
} elseif ($nota >= 6) {
    echo "BIEN";
} elseif ($nota >= 5) {
    echo "SUFICIENTE";
} else {
    echo "INSUFICIENTE";
}

echo "\n";

?>
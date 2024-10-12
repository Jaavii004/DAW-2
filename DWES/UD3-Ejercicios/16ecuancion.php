<?php

/**
 * @Author: Javier Puertas
 */

// Realiza un programa que resuelva una ecuación de primer grado (del tipo 2(ax - b)=0)

$a = readline("Valor de A: ");
$b = readline("Valor de B: ");

if ($a == 0) {
    echo "El valor de A no puede ser 0\n";
} else {
    $x = $b / $a;
    echo "La solución de la ecuación 2({$a}x-$b)=0 es: x = " . $x . "\n";
}

?>
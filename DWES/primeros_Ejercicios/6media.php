<?php

/**
 * @Author: Javier Puertas
 */

$numeros = [];

system('clear');

$contnum = readline("Cuantos números quieres:(mínimo 5) ");

for ($i=0; $i < $contnum; $i++) { 
    $num = readline("Dime el numero ".($i+1).": ");
    array_push($numeros, $num);
}

echo "Suma ". round(array_sum($numeros))."\n";

echo "Números introducidos: " . implode(", ", $numeros) . "\n";

$media = array_sum($numeros) / count($numeros);

echo "Media sin redondear: " . $media . "\n";

echo "Media redondeada: " . round($media) . "\n";
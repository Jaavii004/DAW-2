<?php

/**
 * @Author: Javier Puertas
 */

$numeros = [];

system('clear');

$contnum = readline("Cuantos numeros quieres: ");

for ($i=0; $i < $contnum; $i++) { 
    $num = readline("Dime el numero ".($i+1).": ");
    array_push($numeros, $num);
}

//print_r($numeros);

echo "Suma ". array_sum($numeros);


?>
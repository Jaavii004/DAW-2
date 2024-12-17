<?php

/**
 * @Author: Javier Puertas
 */


$palabraSecreta = "hola";
$intentos = 5;
$hasGanado = false;

function MostrarPalabra($palabraSecreta, $palabraInput) {
    $palabraArraySecreta = str_split($palabraSecreta);
    $palabraArrayInput = str_split($palabraInput);

    if (count($palabraArraySecreta) > count($palabraArrayInput)) {
        for ($i=count($palabraArrayInput); $i < count($palabraArraySecreta); $i++) { 
            $palabraArrayInput[$i] = "_";
        }
    }

    for ($i=0; $i < count($palabraArraySecreta); $i++) { 
        if ($palabraArraySecreta[$i] == $palabraArrayInput[$i]) {
            echo $palabraArrayInput[$i];
        } else {
            echo "_";
        }
        echo " ";
    }
    echo "\n";

}

for ($i=0; $i < $intentos; $i++) { 
    $InputPalabra = ReadLine("Dime la palabra");
    MostrarPalabra($palabraSecreta, $InputPalabra);

    if ($palabraSecreta == $InputPalabra) {
        $i = $intentos+1;
        echo "HAS GANADO!!!!!";
        $hasGanado = true;
    } else {
        echo "Te quedan ".($intentos-$i-1). " intentos\n";
    }
}

if (!$hasGanado) {
    echo "Te quedaste sin intentos lo sentimos";
}



?>
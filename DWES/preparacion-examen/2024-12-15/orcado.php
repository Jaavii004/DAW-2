<?php

/**
 * @Author: Javier Puertas
 */


$palabraSecreta = "hola";
$intentos = 5;




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
    } else {
        echo "Te quedan ".($intentos-$i). " intentos\n";
    }
}




?>
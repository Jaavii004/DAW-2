<?php

/**
 * @Author: Javier Puertas
 */


// Solicita al usuario un número y genera su tabla de multiplicar del 1 al 10. 
// Muestra cada operación y resultado por pantalla.


$tabla = 12;

$hasta = 100;

for ($i=0; $i <= $hasta; $i++) { 
    echo $tabla. " x " . $i . "= " . ($tabla*$i). "\n";
}


?>
<?php

/**
 * @Author: Javier Puertas
 */


$celsius = 32;

function PasarCelFar($celsius) {
    
    $resultado = ($celsius * 9/5) + 32;
    return $resultado;
}

echo PasarCelFar($celsius);


?>
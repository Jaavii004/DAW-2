<?php

/**
 * @Author: Javier Puertas
 */

// Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
// programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
// “Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
// satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.

$combinacionCorrecta = 1234;
$intentos = 4;

for ($i = 1; $i <= $intentos; $i++) {
    $combinacion = readline("Introduce la combinación de 4 cifras: ");

    if ($combinacion == $combinacionCorrecta) {
        echo "La caja fuerte se ha abierto satisfactoriamente.";
        $i=5;
    } else {
        echo "Lo siento, esa no es la combinación." . PHP_EOL;
        if ($i < $intentos) {
            echo "Te quedan " . ($intentos - $i) . " intentos." . PHP_EOL;
        }
    }
}

?>
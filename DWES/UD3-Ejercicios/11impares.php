<?php

/**
 * @Author: Javier Puertas
 */

$numero = readline("Dame un numero para saber los impares menor que el: "); 

echo "Números impares menores que $numero:\n";

for ($i = 1; $i < $numero; $i++) {
    if ($i %2 == 1) {
        echo "- ".$i."\n";
    }
}

?>
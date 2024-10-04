<?php

/**
 * @Author: Javier Puertas
 */

$dia = date('d');

if ($dia <= 15) {
    echo "primera quincena";
} else {
    echo "segunda quincena";
}

echo "\n";
?>
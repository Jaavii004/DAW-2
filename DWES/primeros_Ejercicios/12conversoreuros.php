<?php

/**
 * @Author: Javier Puertas
 */

$valorPeseta = 166.386;
$pesetas = readline("Introduce la cantidad en pesetas: ");
$euros = $pesetas / $valorPeseta;

echo "La cantidad de pesetas ($pesetas) en euros es: " . $euros;

echo "\n";
?>
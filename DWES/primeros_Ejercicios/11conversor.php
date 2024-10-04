<?php

/**
 * @Author: Javier Puertas
 */

$valorPeseta = 166.386;
$euros = readline("Introduce la cantidad en euros: ");
$pesetas = $euros * $valorPeseta;

echo "La cantidad de euros ($euros) en pesetas es: " . $pesetas;

echo "\n";
?>
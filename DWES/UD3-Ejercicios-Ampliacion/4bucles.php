<?php

/**
 * @Author: Javier Puertas
 */

// Muestra los múltiplos de 5 entre 0 y 100 usando:
//  a) bucle for
//  b) bucle while
//  c) bucle do-while

echo "a) bucle for\n";
for ($i = 0; $i <= 100; $i++) {
    if ($i % 5 == 0) {
        echo $i . " ";
    }
}
echo "\n";

echo "b) bucle while\n";
$i = 0;
while ($i <= 100) {
    if ($i % 5 == 0) {
        echo $i . " ";
    }
    $i++;
}
echo "\n";

echo "c) bucle do-while\n";
$i = 0;
do {
    if ($i % 5 == 0) {
        echo $i . " ";
    }
    $i++;
} while ($i <= 100);

echo "\n";

?>
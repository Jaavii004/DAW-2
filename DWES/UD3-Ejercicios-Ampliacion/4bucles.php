<?php

/**
 * @Author: Javier Puertas
 */

// Muestra los múltiplos de 5 entre 0 y 100 usando:
//  a) bucle for
//  b) bucle while
//  c) bucle do-while

echo "a) bucle for\n";

for ($i = 0; $i <= 100; $i += 5) {
    echo $i . " ";
}
echo "\n";

echo "b) bucle while\n";
$i = 0;
while ($i <= 100) {
    echo $i . " ";
    $i += 5;
}
echo "\n";

echo "c) bucle do-while\n";
$i = 0;
do {
    echo $i . " ";
    $i += 5;
} while ($i <= 100);

echo "\n";

?>
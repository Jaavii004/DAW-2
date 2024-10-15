<?php

/**
 * @Author: Javier Puertas
 */

// Define tres arrays de 20 números enteros cada uno, con nombres “numero”, “cuadrado” y
// “cubo”. Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se
// deben almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo”
// se deben almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el
// contenido de los tres arrays dispuesto en tres columnas

// Define tres arrays de 20 números enteros cada uno
$numeros = [];
$cuadrado = [];
$cubo = [];

for ($i = 0; $i < 20; $i++) {
    $numeros[$i] = rand(0, 100);
}

for ($i = 0; $i < count($numeros); $i++) {
    $cuadrado[] = $numeros[$i] * $numeros[$i];
}

for ($i = 0; $i < count($numeros); $i++) {
    $cubo[] = $numeros[$i] * $numeros[$i] * $numeros[$i];
}

echo "Numero\t|     Cuadrado\t|       Cubo\n";
for ($i = 0; $i < 20; $i++) {
    echo $numeros[$i] . "\t|\t" . $cuadrado[$i] . "\t|\t" . $cubo[$i] . "\n";
}

?>
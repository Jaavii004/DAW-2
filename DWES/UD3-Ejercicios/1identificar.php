<?php

/**
 * @Author: Javier Puertas
 */

// Elabora un programa que dado un carácter determine si es:
// 1. una letra mayúscula
// 2. una letra minúscula
// 3. un carácter numérico
// 4. un carácter blanco
// 5. un carácter de puntuación
// 6. un carácter especial

$caracter = readline("Introduce un caracter: ");

if (is_numeric($caracter)) {
    echo "Es un carácter numérico";
} else if (ctype_upper($caracter)) {
    echo "Es una letra mayúscula";
} else if (ctype_lower($caracter)) {
    echo "Es una letra minúscula";
} else if (ctype_punct($caracter)) {
    echo "Es un carácter de puntuación";
} else if (ctype_space($caracter)) {
    echo "Es un carácter blanco";
} else {
    echo "Es un carácter especial";
}


?>
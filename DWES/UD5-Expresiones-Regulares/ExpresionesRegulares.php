<?php

/**
 * @Author: Javier Puertas
 */


// a) Genera el patrón para los teléfonos fijos de la provincia de Valencia
$telefono = "961234567";
if (preg_match("/^96\\d{7}$/", $telefono)) {
    echo "Teléfono válido.";
} else {
    echo "Teléfono no válido.";
}

// b) Genera el patrón para los códigos postales de la Comunidad Valenciana
$codigo_postal = "46200";
if (preg_match("/^(46)\\d{3}$/", $codigo_postal)) {
    echo "Código postal válido.";
} else {
    echo "Código postal no válido.";
}

// c) Genera el patrón para los teléfonos móviles
$movil = "612345678";
if (preg_match("/^[67]\\d{8}$/", $movil)) {
    echo "Móvil válido.";
} else {
    echo "Móvil no válido.";
}

// d) Genera el patrón para un NIF
$nif = "12345678Z";
if (preg_match("/^\\d{8}[A-Z]$/", $nif)) {
    echo "NIF válido.";
} else {
    echo "NIF no válido.";
}

// e) Genera el patrón para fecha en formato dd/mm/aaaa o bien dd-mm-aaaa
$fecha = "12/12/2024";
if (preg_match("/^\\d{2}[\\/\\-]\\d{2}[\\/\\-]\\d{4}$/", $fecha)) {
    echo "Fecha válida.";
} else {
    echo "Fecha no válida.";
}

// f) Genera el patrón para una cadena que sea aprobado (puede ser mayúsculas o minúsculas)
$cadena = "Aprobado";
if (preg_match("/^[aA][pP][rR][oO][bB][aA][dD][oO]$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// g) Genera el patrón para una cadena que contenga aprobado en minúsculas
$cadena = "El examen fue aprobado";
if (preg_match("/aprobado/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// h) Genera el patrón para una cadena que contenga aprobado tanto en mayúsculas como en minúsculas
$cadena = "Aprobado es el resultado";
if (preg_match("/[aA][pP][rR][oO][bB][aA][dD][oO]/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// i) Genera el patrón para letras mayúsculas/minúsculas y espacios
$cadena = "Hola Mundo";
if (preg_match("/^[a-zA-Z\\s]+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// j) Genera el patrón para solamente números, sin espacios
$cadena = "123456";
if (preg_match("/^\\d+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// k) Genera el patrón para números con espacios
$cadena = "123 456 789";
if (preg_match("/^[0-9\\s]+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// l) Genera el patrón para texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados
$cadena = "Texto con acentos y 123";
if (preg_match("/^[a-zA-Z0-9áéíóúÁÉÍÓÚ\\s]+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// m) Genera el patrón para el caso anterior añadiendo los signos de puntuación: comillas simples, coma, punto, punto y coma, dos puntos y guiones
$cadena = "Texto, con puntuación: 'y';";
if (preg_match("/^[a-zA-Z0-9áéíóúÁÉÍÓÚ\\s,.'\";:-]+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// n) Genera el patrón para validar una dirección de email
$email = "ejemplo@dominio.com";
if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/", $email)) {
    echo "Email válido.";
} else {
    echo "Email no válido.";
}

// o) Genera el patrón para validar una URL sencilla (http://www.ieslasenia.org/ejercicio?16)
$url = "http://www.ieslasenia.org/ejercicio?16";
if (preg_match("/^https?:\\/\\/[a-zA-Z0-9.-]+\\/[a-zA-Z0-9?=&#]*$/", $url)) {
    echo "URL válida.";
} else {
    echo "URL no válida.";
}

// p) Genera el patrón para validar una contraseña con al menos un carácter en minúscula, una mayúscula, un número y al menos 6 caracteres de longitud
$password = "Abc123";
if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d).{6,}$/", $password)) {
    echo "Contraseña válida.";
} else {
    echo "Contraseña no válida.";
}

// q) Genera el patrón para validar una IPv4
$ip = "192.168.1.1";
if (preg_match("/^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/", $ip)) {
    echo "IP válida.";
} else {
    echo "IP no válida.";
}

// r) Genera el patrón para validar una MAC separada por :
$mac = "00:14:22:01:23:45";
if (preg_match("/^([0-9A-Fa-f]{2}:){5}[0-9A-Fa-f]{2}$/", $mac)) {
    echo "MAC válida.";
} else {
    echo "MAC no válida.";
}

// s) Genera el patrón para validar una MAC separada por -
$mac = "00-14-22-01-23-45";
if (preg_match("/^([0-9A-Fa-f]{2}-){5}[0-9A-Fa-f]{2}$/", $mac)) {
    echo "MAC válida.";
} else {
    echo "MAC no válida.";
}

// t) Genera el patrón para validar una matrícula de vehículo española
$matricula = "1234ABC";
if (preg_match("/^\\d{4}[A-Za-z]{3}$/", $matricula)) {
    echo "Matrícula válida.";
} else {
    echo "Matrícula no válida.";
}

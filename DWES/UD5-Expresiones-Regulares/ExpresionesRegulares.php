<?php

/**
 * @Author: Javier Puertas
 */


// a) Teléfonos fijos de la provincia de Valencia
$telefono = "961234567";
if (preg_match("/^96\\d{8}$/", $telefono)) {
    echo "Teléfono válido.";
} else {
    echo "Teléfono no válido.";
}

// b) Códigos postales de la Comunidad Valenciana
$codigo_postal = "46001";
if (preg_match("/^(46)\\d{3}$/", $codigo_postal)) {
    echo "Código postal válido.";
} else {
    echo "Código postal no válido.";
}

// c) Teléfonos móviles
$movil = "612345678";
if (preg_match("/^[67]\\d{8}$/", $movil)) {
    echo "Móvil válido.";
} else {
    echo "Móvil no válido.";
}

// d) NIF
$nif = "12345678Z";
if (preg_match("/^\\d{8}[A-Za-z]$/", $nif)) {
    echo "NIF válido.";
} else {
    echo "NIF no válido.";
}

// e) Fecha en formato dd/mm/aaaa o dd-mm-aaaa
$fecha = "12/12/2024";
if (preg_match("/^\\d{2}[\\/\\-]\\d{2}[\\/\\-]\\d{4}$/", $fecha)) {
    echo "Fecha válida.";
} else {
    echo "Fecha no válida.";
}

// f) Cadena que sea "aprobado" (mayúsculas o minúsculas)
$cadena = "Aprobado";
if (preg_match("/^[aA][pP][rR][oO][bB][aA][dD][oO]$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// g) Cadena que contenga "aprobado" en minúsculas
$cadena = "El examen fue aprobado";
if (preg_match("/aprobado/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// h) Cadena que contenga "aprobado" tanto en mayúsculas como minúsculas
$cadena = "Aprobado es el resultado";
if (preg_match("/[aA][pP][rR][oO][bB][aA][dD][oO]/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// i) Letras mayúsculas/minúsculas y espacios
$cadena = "Hola Mundo";
if (preg_match("/^[a-zA-Z\\s]+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// j) Solamente números, sin espacios
$cadena = "123456";
if (preg_match("/^\\d+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// k) Números con espacios
$cadena = "123 456 789";
if (preg_match("/^[0-9\\s]+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// l) Texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados
$cadena = "Texto con acentos y 123";
if (preg_match("/^[a-zA-Z0-9áéíóúÁÉÍÓÚ\\s]+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// m) Texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados con signos de puntuación
$cadena = "Texto, con puntuación: 'y';";
if (preg_match("/^[a-zA-Z0-9áéíóúÁÉÍÓÚ\\s,.'\";:-]+$/", $cadena)) {
    echo "Cadena válida.";
} else {
    echo "Cadena no válida.";
}

// n) Dirección de email
$email = "ejemplo@dominio.com";
if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/", $email)) {
    echo "Email válido.";
} else {
    echo "Email no válido.";
}

// o) URL sencilla
$url = "http://www.ieslasenia.org/ejercicio?16";
if (preg_match("/^https?:\\/\\/[a-zA-Z0-9.-]+\\/[a-zA-Z0-9?=&#]*$/", $url)) {
    echo "URL válida.";
} else {
    echo "URL no válida.";
}

// p) Contraseña con requisitos específicos
$password = "Abc123";
if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d).{6,}$/", $password)) {
    echo "Contraseña válida.";
} else {
    echo "Contraseña no válida.";
}

// q) IPv4
$ip = "192.168.1.1";
if (preg_match("/^((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/", $ip)) {
    echo "IP válida.";
} else {
    echo "IP no válida.";
}

// r) MAC separada por :
$mac = "00:14:22:01:23:45";
if (preg_match("/^([0-9A-Fa-f]{2}:){5}[0-9A-Fa-f]{2}$/", $mac)) {
    echo "MAC válida.";
} else {
    echo "MAC no válida.";
}

// s) MAC separada por -
$mac = "00-14-22-01-23-45";
if (preg_match("/^([0-9A-Fa-f]{2}-){5}[0-9A-Fa-f]{2}$/", $mac)) {
    echo "MAC válida.";
} else {
    echo "MAC no válida.";
}

// t) Matrícula de vehículo española
$matricula = "1234ABC";
if (preg_match("/^\\d{4}[A-Za-z]{3}$/", $matricula)) {
    echo "Matrícula válida.";
} else {
    echo "Matrícula no válida.";
}

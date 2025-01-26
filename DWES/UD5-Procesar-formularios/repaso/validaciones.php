<?php

/**
 * @Author: Javier Puertas
 */

// Validaciones en funciones
// Funciones de validación
function validarNombre($nombre) {
    if (empty($nombre)) {
        return 'El nombre completo es obligatorio.';
    } elseif (!ctype_alpha(str_replace(' ', '', $nombre))) {
        return 'El nombre completo solo puede contener letras y espacios.';
    }
    return null;
}

function validarContrasena($contrasena) {
    if (empty($contrasena)) {
        return 'La contraseña es obligatoria.';
    } elseif (strlen($contrasena) < 6) {
        return 'La contraseña debe tener al menos 6 caracteres.';
    }
    return null;
}

function validarEmail($email) {
    if (empty($email)) {
        return 'El email no puede estar vacío.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'El email no es válido.';
    }
    return null;
}

function validarIdiomas($idiomas) {
    if (empty($idiomas)) {
        return 'Debes seleccionar al menos un idioma.';
    }
    return null;
}

function validarNivelEstudios($nivelEstudios) {
    if (empty($nivelEstudios)) {
        return 'El nivel de estudios es obligatorio.';
    }
    return null;
}

function validarNacionalidad($nacionalidad) {
    if (empty($nacionalidad)) {
        return 'La nacionalidad es obligatoria.';
    }
    return null;
}


?>
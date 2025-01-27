<?php

/**
 * @Author: Javier Puertas
 */

// Validaciones en funciones
// Funciones de validación
function validarNombre($nombre) {
    if (empty($nombre)) {
        return 'El nombre es obligatorio.';
    } elseif (!ctype_alpha(str_replace(' ', '', $nombre))) {
        return 'El nombre solo puede contener letras y espacios.';
    }
    return null;
}

function validarUser($user) {
    if (empty($user)) {
        return 'El usuario es obligatorio.';
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

function validarSituaccion($situaccion) {
    if (empty($situaccion)) {
        return 'Debes seleccionar al menos una situaccion.';
    }
    return null;
}

function validarplb_afectada($plb_afectada) {
    if (empty($plb_afectada)) {
        return 'Debes seleccionar al menos una población afectada.';
    }
    return null;
}

function validarElementosAfectados($ElementosAfectados) {
    if (empty($ElementosAfectados)) {
        return 'Debes seleccionar al menos una Elementos Afectados.';
    }
    return null;
}

function validarNecesidades($Necesidades) {
    if (empty($Necesidades)) {
        return 'Debes seleccionar al menos una Necesidadad.';
    }
    return null;
}

function validarLOPDGDD($LOPDGDD) {
    if (empty($LOPDGDD)) {
        return 'Debes acceptar la LOPDGDD.';
    }
    return null;
}


?>
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

function validarFoto($archivo, $directorio) {
    if (!isset($archivo)) {
        return 'Debes subir una foto.';
    } elseif ($archivo['error'] !== UPLOAD_ERR_OK) {
        return 'Error al subir la foto.';
    }

    $tamanoMaximo = 50 * 1024; // 50 KB
    $extensionesPermitidas = ['jpg', 'gif', 'png'];
    $informacionArchivo = pathinfo($archivo['name']);
    $extension = strtolower($informacionArchivo['extension']);

    if (!in_array($extension, $extensionesPermitidas)) {
        return 'La foto debe ser jpg, gif o png.';
    }

    if ($archivo['size'] > $tamanoMaximo) {
        return 'El tamaño máximo de la foto es 50 KB.';
    }

    if (!is_dir($directorio)) {
        mkdir($directorio);
    }
    $informacionArchivo = pathinfo($archivo['name']);
    $extension = $informacionArchivo['extension'];
    $nombreUnico = uniqid('foto_') . '.' . $extension;
    $rutaDestino = $directorio . $nombreUnico;

    if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
        return $rutaDestino;
    } else {
        return 'Error al mover la foto.';
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
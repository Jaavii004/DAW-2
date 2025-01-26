<?php

/**
 * @Author: Javier Puertas
 */

// 25. Crea una Web para obtener los siguientes datos: Nombre completo, Contraseña (mínimo 6
// caracteres), Nivel de Estudios(Sin estudios, Educación Secundaria Obligatoria, Bachillerato,
// Formación Profesional, Estudios Universitarios), Nacionalidad (Española, Otra), Idiomas
// (Español, Inglés, Francés, Alemán Italiano), Email, Adjuntar Foto (sólo extensiones jpg, gif y
// png, tamaño máximo 50 KB). Además de las comprobaciones de validación, se debe comprobar
// que sube fichero, que el fichero tiene extensión (puedes usar explode()) y ésta es válida, que hay
// directorio donde guardarlo y que se genera con nombre único. Si todo ha ido bien, redirige al
// usuario a una página donde se le indique que se ha procesado con éxito e incluye tu nombre y
// grupo de clase.

include 'validaciones.php';

$errores = [];
$nombre = $_POST['nombre_completo'] ?? null;
$contrasena = $_POST['contrasena'] ?? null;
$nivel_estudios = $_POST['nivel_estudios'] ?? null;
$nacionalidad = $_POST['nacionalidad'] ?? null;
$idiomas = $_POST['idiomas'] ?? [];
$email = $_POST['email'] ?? null;
$validacion = null;
$fotoCorrecta = false;
$rutaFotoTemporal = $_POST['foto_temp'] ?? null;

// Comprobamos que por POST nos pasan todas las variables
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = validarNombre($nombre);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarContrasena($contrasena);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarNivelEstudios($nivel_estudios);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarNacionalidad($nacionalidad);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarIdiomas($idiomas);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarEmail($email);
    if ($resultado) {
        $errores[] = $resultado;
    }

    // comprobamos que hay imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fotoCorrecta = true;
        $nombre_archivo = $_FILES['foto']['name'];
        $tamano_archivo = $_FILES['foto']['size'];
        $informacionArchivo = pathinfo($nombre_archivo);
        $extension = $informacionArchivo['extension'];

        if (!in_array($extension, ['jpg', 'gif', 'png'])) {
            $errores[] = 'La foto debe ser jpg, gif o png.';
            $fotoCorrecta = false;
        }

        if ($tamano_archivo > 50 * 1024) {
            $errores[] = 'El tamaño máximo de la foto es 50 KB.';
            $fotoCorrecta = false;
        }

        // $directorio = 'uploads/';
        // if (!is_dir($directorio)) {
        //     mkdir($directorio);
        // }
        if ($fotoCorrecta) {
            $nombreUnico = uniqid("img_") . '.' . $extension;
            move_uploaded_file($_FILES['foto']['tmp_name'], $nombreUnico);
            $rutaFotoTemporal = $nombreUnico;
        }
    } else {
        // si no hay imagen pero tenemos la de antes lo ponemos
        if (empty($rutaFotoTemporal)) {
            $errores[] = 'Debes subir una foto válida.';
        } else {
            $fotoCorrecta = true;
        }
    }

    if (empty($errores)) {
        // seprara en dos botones la accion
        if ($_POST['enviar']) {
            header("Location: 25-formulario-exito.php?nombre=$nombre&contrasena=$contrasena&nivel_estudios=$nivel_estudios&nacionalidad=$nacionalidad&idiomas=" . implode(',', $idiomas) . "&email=$email&ruta_img=$rutaFotoTemporal");
            exit;
        } elseif ($_POST['validar']) {
            $validacion = 'Formulario validado correctamente.';
        }
    }
}

// Quitar aray errores los null
//$errores = array_filter($errores);
//
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 25</title>
</head>
<body>
    <h1>Formulario 25</h1>

    <!-- Mostramos los errores -->
    <ul style="color: red;">
        <?php foreach ($errores as $error): ?>
            <li><?php echo $error ?></li>
        <?php endforeach; ?>
    </ul>
    <!-- Mostramos si es valido el formulario -->
    <ul style="color: green;">
        <?php if (!empty($validacion)){ ?>
            <li><?php echo $validacion ?></li>
        <?php }; ?>
    </ul>

    <form method="post" action="index.php" enctype="multipart/form-data">
        <label>Nombre Completo:
            <input type="text" name="nombre_completo" value="<?php echo $nombre; ?>">
        </label>
        <br>

        <label>Contraseña:
            <input type="password" name="contrasena" value="<?php echo $contrasena; ?>">
        </label>
        <br>

        <label>Nivel de Estudios:
            <select name="nivel_estudios">
                <option value="">Selecciona</option>
                <!-- Comprobamos si los han marcado antes -->
                <option value="Sin estudios"<?php if ($nivel_estudios === 'Sin estudios') echo ' selected'; ?>>Sin estudios</option>
                <option value="ESO"<?php if ($nivel_estudios === 'ESO') echo ' selected'; ?>>ESO</option>
                <option value="Bachillerato"<?php if ($nivel_estudios === 'Bachillerato') echo ' selected'; ?>>Bachillerato</option>
                <option value="FP"<?php if ($nivel_estudios === 'FP') echo ' selected'; ?>>FP</option>
                <option value="Universidad"<?php if ($nivel_estudios === 'Universidad') echo ' selected'; ?>>Universidad</option>
            </select>
        </label>
        <br>

        <label>Nacionalidad:
            <input type="radio" name="nacionalidad" value="Española"<?php if ($nacionalidad === 'Española') echo ' checked'; ?>> Española
            <input type="radio" name="nacionalidad" value="Otra"<?php if ($nacionalidad === 'Otra') echo ' checked'; ?>> Otra
        </label>
        <br>

        <label>Idiomas:<br>
            <input type="checkbox" name="idiomas[]" value="Español"<?php if (in_array('Español', $idiomas)) echo ' checked'; ?>> Español
            <input type="checkbox" name="idiomas[]" value="Inglés"<?php if (in_array('Inglés', $idiomas)) echo ' checked'; ?>> Inglés
            <input type="checkbox" name="idiomas[]" value="Francés"<?php if (in_array('Francés', $idiomas)) echo ' checked'; ?>> Francés
        </label>
        <br>

        <label>Email:
            <input type="text" name="email" value="<?php echo $email; ?>">
        </label>
        <br>

        <!-- Si hay foto ponemos la foto si no dejamos subirla -->
        <?php if ($fotoCorrecta) { ?>
            <p>Foto subida:</p>
            <img src="<?php echo $rutaFotoTemporal; ?>" alt="Foto subida" style="max-width: 100px;">
            <input type="hidden" name="foto_temp" value="<?php echo $rutaFotoTemporal; ?>">
            <input type="hidden" name="MAX_FILE_SIZE" value="50">
        <?php } else { ?>
            <label>Foto:
                <input type="file" name="foto">
            </label>
        <?php } ?>
        <br>

        <button type="submit" name="enviar" value="enviar">Enviar</button>
        <button type="submit" name="validar" value="validar">Validar</button>
        <input type="Reset" value="reset" />
    </form>
</body>
</html>

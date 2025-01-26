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
$accion = $_POST['accion'] ?? null;
$validacion = null;
$fotoCorrecta = false;
$rutaFotoTemporal = $_POST['foto_temp'] ?? null;

// Comprobamos que por POST nos pasan todas las variables
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobamos el nombre no este vacio y solo contenga letras y espacios
    $errores[] = validarNombre($nombre);

    // Comprobamos la contraseña sea mayor que 6 y no este vacia
    $errores[] = validarContrasena($contrasena);

    // Comprobamos que el nivel de estudios no este vacio
    $errores[] = validarNivelEstudios($nivel_estudios);

    // Comprobamos que la nacionalidad no este vacia
    $errores[] = validarNacionalidad($nacionalidad);

    // Comprobamos que haya marcado al menos un idioma
    $errores[] = validarIdiomas($idiomas);

    // Comprobamos que sea un email
    $errores[] = validarEmail($email);

    // comprobamos que hay imagen
    $errores[] = validarFoto($_FILES['foto'], 'uploads/');

    if (empty($errores)) {
        // seprara en dos botones la accion
        if ($accion !== 'validar') {
            header("Location: 25-formulario-exito.php?nombre=$nombre&contrasena=$contrasena&nivel_estudios=$nivel_estudios&nacionalidad=$nacionalidad&idiomas=" . implode(',', $idiomas) . "&email=$email&ruta_img=$rutaFotoTemporal");
            exit;
        } else {
            $validacion = 'Formulario validado correctamente.';
        }
    }
}

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
            <input type="hidden" name="MAX_FILE_SIZE" value="51200">
        <?php } else { ?>
            <label>Foto:
                <input type="file" name="foto">
            </label>
        <?php } ?>
        <br>

        <button type="submit" name="accion" value="enviar">Enviar</button>
        <button type="submit" name="accion" value="validar">Validar</button>
        <input type="Reset" value="reset">
    </form>
</body>
</html>

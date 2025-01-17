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

$errores = [];
$nombre = isset($_POST['nombre_completo']) ? $_POST['nombre_completo'] : '';
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
$nivel_estudios = isset($_POST['nivel_estudios']) ? $_POST['nivel_estudios'] : '';
$nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '';
$idiomas = isset($_POST['idiomas']) ? $_POST['idiomas'] : [];
$email = isset($_POST['email']) ? $_POST['email'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nombre_completo'])) {
        $errores[] = 'El nombre completo es obligatorio.';
    }

    if (empty($_POST['contrasena']) || strlen($_POST['contrasena']) < 6) {
        $errores[] = 'La contraseña debe tener al menos 6 caracteres.';
    }

    if (empty($_POST['nivel_estudios'])) {
        $errores[] = 'El nivel de estudios es obligatorio.';
    }

    if (empty($_POST['nacionalidad'])) {
        $errores[] = 'La nacionalidad es obligatoria.';
    }

    if (empty($_POST['idiomas'])) {
        $errores[] = 'Debes seleccionar al menos un idioma.';
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El email es obligatorio y debe ser válido.';
    }

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nombre_archivo = $_FILES['foto']['name'];
        $tamano_archivo = $_FILES['foto']['size'];
        $extension = substr($nombre_archivo, strlen($nombre_archivo) - 1);

        if (!in_array($extension, ['jpg', 'gif', 'png'])) {
            $errores[] = 'La foto debe ser jpg, gif o png.';
        }

        if ($tamano_archivo > 50 * 1024) {
            $errores[] = 'El tamaño máximo de la foto es 50 KB.';
        }

        if (empty($errores)) {
            $directorio = 'uploads/';
            if (!is_dir($directorio)) {
                mkdir($directorio);
            }

            $nombreUnico = uniqid("unica") . '.' . $extension;
            move_uploaded_file($_FILES['foto']['tmp_name'], $directorio . $nombreUnico);
        }
    } else {
        $errores[] = 'Debes subir una foto válida.';
    }

    if (empty($errores)) {
        header("Location: 25-formulario-exito.php?nombre=$nombre&grupo=$grupo&img=");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Simple</title>
</head>
<body>
    <h1>Formulario de Datos</h1>

    <ul style="color: red;">
        <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    
    <form method="post" enctype="multipart/form-data">
        <label>Nombre Completo:
            <input type="text" name="nombre_completo" value="<?php echo $no?>">
        </label>
        <br>

        <label>Contraseña:
            <input type="password" name="contrasena">
        </label>
        <br>

        <label>Nivel de Estudios:
            <select name="nivel_estudios">
                <option value="">Selecciona</option>
                <option value="Sin estudios">Sin estudios</option>
                <option value="ESO">ESO</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="FP">FP</option>
                <option value="Universidad">Universidad</option>
            </select>
        </label>
        <br>

        <label>Nacionalidad:
            <select name="nacionalidad">
                <option value="">Selecciona</option>
                <option value="Española">Española</option>
                <option value="Otra">Otra</option>
            </select>
        </label>
        <br>

        <label>Idiomas:<br>
            <input type="checkbox" name="idiomas[]" value="Español"> Español
            <input type="checkbox" name="idiomas[]" value="Inglés"> Inglés
            <input type="checkbox" name="idiomas[]" value="Francés"> Francés
        </label>
        <br>

        <label>Email:
            <input type="text" name="email">
        </label>
        <br>

        <label>Foto:
            <input type="file" name="foto">
        </label>
        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>

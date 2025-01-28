<?php

/**
 * @Author: Javier Puertas
 */

include 'validaciones_Javier.php';

$errores = [];

$nombre = $_POST['nombre'] ?? null;
$email = $_POST['email'] ?? null;
$user = $_POST['user'] ?? null;
$contrasena = $_POST['contrasena'] ?? null;
$situacion = $_POST['situacion'] ?? null;
$plb_afectada = $_POST['plb_afectada'] ?? null;
$ElementosAfectados = $_POST['ElementosAfectados'] ?? [];
$Necesidades = $_POST['Necesidades'] ?? [];
$LOPDGDD = $_POST['LOPDGDD'] ?? null;

$validacion = null;
$fotoCorrecta = false;
$rutaFotoTemporal = $_POST['foto_temp'] ?? null;

// Comprobamos que por POST nos pasan todas las variables
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = validarNombre($nombre);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarEmail($email);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarUser($user);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarContrasena($contrasena);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarSituaccion($situacion);
    if ($resultado) {
        $errores[] = $resultado;
    }


    $resultado = validarplb_afectada($plb_afectada);
    if ($resultado) {
        $errores[] = $resultado;
    }
    ///////////////////

    $resultado = validarElementosAfectados($ElementosAfectados);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarNecesidades($Necesidades);
    if ($resultado) {
        $errores[] = $resultado;
    }

    $resultado = validarLOPDGDD($LOPDGDD);
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

        if ($extension !== 'png') {
            $errores[] = 'La foto debe ser png.';
            $fotoCorrecta = false;
        }

        if ($tamano_archivo > 100 * 1024) {
            $errores[] = 'El tamaño máximo de la foto es 100 KB.';
            $fotoCorrecta = false;
        }

        if ($fotoCorrecta) {
            $resultado = validarNombre($nombre);
            if ($resultado) {
                $errores[] = "Para subir la imagen debes poner el nombre de usuario valido";
                $fotoCorrecta = false;
            }
        }

        if ($fotoCorrecta) {
            $directorio = 'img/';
            if (!is_dir($directorio)) {
                mkdir($directorio);
            }
            $nombreUnico = $nombre . ".".$extension;
            move_uploaded_file($_FILES['foto']['tmp_name'], $directorio . $nombreUnico);
            $rutaFotoTemporal = $directorio . $nombreUnico;
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
            header("Location: JavierPuertas_ok.php?nombre=$nombre&email=$email&user=$user&contrasena=$contrasena&situacion=$situacion&plb_afectada=$plb_afectada&ElementosAfectados=" . implode(',', $ElementosAfectados) . "&Necesidades=" . implode(',', $Necesidades) . "&ruta_img=$rutaFotoTemporal&LOPDGDD=$LOPDGDD");
            exit;
        } elseif ($_POST['validar']) {
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
    <title>Necesidades Post-DANA</title>
</head>
<body>
    <h1>Necesidades Post-DANA</h1>

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

    <form method="post" action="JavierPuertas.php" enctype="multipart/form-data">
        <label>Nombre:
            <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        </label>
        <br>

        <label>Email:
            <input type="text" name="email" value="<?php echo $email; ?>">
        </label>
        <br>

        <label>Usuario:
            <input type="text" name="user" value="<?php echo $user; ?>">
        </label>
        <br>

        <label>Contraseña:
            <input type="password" name="contrasena" value="<?php echo $contrasena; ?>">
        </label>
        <br>

        <label>Empresa o particular:
            <input type="radio" name="situacion" value="Particular"<?php if ($situacion === 'Particular') echo ' checked'; ?>> Particular
            <input type="radio" name="situacion" value="Empresa"<?php if ($situacion === 'Empresa') echo ' checked'; ?>> Empresa
        </label>
        <br>

        <label>Población afectada:
            <select name="plb_afectada">
                <option value="">Selecciona</option>
                <!-- Comprobamos si los han marcado antes -->
                <option value="Aldaia"<?php if ($plb_afectada === 'Aldaia') echo ' selected'; ?>>Aldaia</option>
                <option value="Catarroja"<?php if ($plb_afectada === 'Catarroja') echo ' selected'; ?>>Catarroja</option>
                <option value="Paiporta"<?php if ($plb_afectada === 'Paiporta') echo ' selected'; ?>>Paiporta</option>
                <option value="Picaña"<?php if ($plb_afectada === 'Picaña') echo ' selected'; ?>>Picaña</option>
                <option value="Sedaví"<?php if ($plb_afectada === 'Sedaví') echo ' selected'; ?>>Sedaví</option>
            </select>
        </label>
        <br>

        <label>Elementos Afectados:
            <select multiple name="ElementosAfectados[]">
                <option value="Casa" <?php if (in_array('Casa', $ElementosAfectados)) echo ' selected'; ?>>Casa</option>
                <option value="Bajo Comercial" <?php if (in_array('Bajo Comercial', $ElementosAfectados)) echo ' selected'; ?>>Bajo Comercial</option>
                <option value="Sótanos Garaje" <?php if (in_array('Sótanos Garaje', $ElementosAfectados)) echo ' selected'; ?>>Sótanos Garaje</option>
                <option value="Trastero" <?php if (in_array('Trastero', $ElementosAfectados)) echo ' selected'; ?>>Trastero</option>
                <option value="Vehículo" <?php if (in_array('Vehículo', $ElementosAfectados)) echo ' selected'; ?>>Vehículo</option>
            </select>
        </label>
        <br>

    
        <label>Necesidades:
            <select name="Necesidades[]" multiple>
                <option value="Extraccion de lodo" <?php if (in_array('Extraccion de lodo', $Necesidades)) echo ' selected'; ?>>Extraccion de lodo</option>
                <option value="Limpieza" <?php if (in_array('Limpieza', $Necesidades)) echo ' selected'; ?>>Limpieza</option>
                <option value="Desinfección" <?php if (in_array('Desinfección', $Necesidades)) echo ' selected'; ?>>Desinfección</option>
                <option value="Secado" <?php if (in_array('Secado', $Necesidades)) echo ' selected'; ?>>Secado</option>
                <option value="Revísion de Estructura" <?php if (in_array('Revísion de Estructura', $Necesidades)) echo ' selected'; ?>>Revísion de Estructura</option>
                <option value="Tareas reconstrucción" <?php if (in_array('Tareas reconstrucción', $Necesidades)) echo ' selected'; ?>>Tareas reconstrucción</option>
                <option value="Excarcelación de coches" <?php if (in_array('Excarcelación de coches', $Necesidades)) echo ' selected'; ?>>Excarcelación de coches</option>
            </select>
        </label>
        <br>

        <input type="checkbox" name="LOPDGDD" <?php if ($LOPDGDD === 'on') echo ' checked'; ?>>
        <label for="LOPDGDD">Acepto la LOPDGDD</label><br>

        <!-- Si hay foto ponemos la foto si no dejamos subirla -->
        <?php if ($fotoCorrecta) { ?>
            <p>Foto subida:</p>
            <img src="<?php echo $rutaFotoTemporal; ?>" alt="Foto subida" style="max-width: 100px;">
            <input type="hidden" name="foto_temp" value="<?php echo $rutaFotoTemporal; ?>">
            <?php } else { ?>
                <label>Foto:
                    <input type="file" name="foto">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100">
                </label>
            <?php } ?>
        <br>

        <!-- Aqui tenemos los botones que si le dan a validar comprobamos los campos y si le da a enviar si esta todo correcto lo mandamos a JavierPuertas_ok.php -->
        <button type="submit" name="enviar" value="enviar">Enviar</button>
        <button type="submit" name="validar" value="validar">Validar</button>
        <input type="Reset" value="Borrar"/>
    </form>
</body>
</html>

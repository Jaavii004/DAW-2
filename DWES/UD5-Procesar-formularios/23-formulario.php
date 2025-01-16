<?php
/**
 * @Author: Javier Puertas
 */

// 23. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
// se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
// la información introducida por el usuario si no hay errores errores. Los datos a recoger son datos
// personales, nivel de estudios (desplegable), situación actual (selección múltiple: estudiando,
// trabajando, buscando empleo, desempleado) y hobbies (marcar de varios mostrados y poner otro
// con opción a introducir texto)

// display errors
// ini_set('display_errors', 1);
// error_reporting(E_ALL);


$errores = [];

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$nivel_estudios = isset($_POST['nivel_estudios']) ? $_POST['nivel_estudios'] : '';
$situacion = isset($_POST['situacion']) ? $_POST['situacion'] : [];
$hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];
$otro_hobby = isset($_POST['otro_hobby']) ? $_POST['otro_hobby'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validar nombre
    if (empty($nombre)) {
        $errores['nombre'] = 'El nombre es obligatorio.';
    }

    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El correo electrónico es inválido o está vacío.';
    }

    // Validar nivel de estudios
    if (empty($nivel_estudios)) {
        $errores['nivel_estudios'] = 'Debes seleccionar un nivel de estudios.';
    }

    // Validar situación actual
    if (empty($situacion)) {
        $errores['situacion'] = 'Debes seleccionar al menos una opción para la situación actual.';
    }

    // Validar hobbies
    if (empty($hobbies) && empty($otro_hobby)) {
        $errores['hobbies'] = 'Debes seleccionar al menos un hobby o especificar otro.';
    }

    // Redirigir a la segunda página si no hay errores
    if (empty($errores)) {
        header('Location: 23-formulario-resultado.php?' . "nombre=$nombre&email=$email&nivel_estudios=$nivel_estudios&situacion=" . implode(',', $situacion) . "&hobbies=" . implode(',', $hobbies) . "&otro_hobby=$otro_hobby");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de recogida de datos</title>
</head>
<body>
    <h1>Formulario de recogida de datos</h1>

    <ul style="color: red;">
        <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>

    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>">
        <br><br>

        <label for="email">Correo electrónico:</label>
        <input type="text" name="email" id="email" value="<?php echo $email;?>">
        <br><br>

        <label for="nivel_estudios">Nivel de estudios:</label>
        <select name="nivel_estudios" id="nivel_estudios">
            <option value="">Seleccione</option>
            <!-- Si esta seleccionado lo muestro seleccionado -->
            <option value="Primaria" <?php if ($nivel_estudios === 'Primaria') echo 'selected'; ?>>Primaria</option>
            <option value="Secundaria" <?php if ($nivel_estudios === 'Secundaria') echo 'selected'; ?>>Secundaria</option>
            <option value="Bachillerato" <?php if ($nivel_estudios === 'Bachillerato') echo 'selected'; ?>>Bachillerato</option>
            <option value="FP" <?php if ($nivel_estudios === 'FP') echo 'selected'; ?>>FP</option>
            <option value="Universitario" <?php if ($nivel_estudios === 'Universitario') echo 'selected'; ?>>Universitario</option>
        </select>
        <br><br>

        <!-- CAMBIAR POR SELECT MULTIPLE -->
        <label>Situación actual:</label><br>
        <select name="situacion[]" multiple>
            <!-- Si esta en el array porque ha sido marcado se marca -->
            <option value="Estudiando" <?php if (in_array('Estudiando', $situacion)) echo 'selected'; ?>>Estudiando</option>
            <option value="Trabajando" <?php if (in_array('Trabajando', $situacion)) echo 'selected'; ?>>Trabajando</option>
            <option value="Buscando empleo" <?php if (in_array('Buscando empleo', $situacion)) echo 'selected'; ?>>Buscando empleo</option>
            <option value="Desempleado" <?php if (in_array('Desempleado', $situacion)) echo 'selected'; ?>>Desempleado</option>
        </select>
        <br>

        <label>Hobbies:</label><br>
        <!-- Si esta en el array porque ha sido marcado se marca -->
        <input type="checkbox" name="hobbies[]" value="Leer" <?php if (in_array('Leer', $hobbies)) echo 'checked'; ?>> Leer<br>
        <input type="checkbox" name="hobbies[]" value="Deporte" <?php if (in_array('Deporte', $hobbies)) echo 'checked'; ?>> Deporte<br>
        <input type="checkbox" name="hobbies[]" value="Música" <?php if (in_array('Música', $hobbies)) echo 'checked'; ?>> Música<br>
        <input type="checkbox" name="hobbies[]" value="Viajar" <?php if (in_array('Viajar', $hobbies)) echo 'checked'; ?>> Viajar<br>
        Otro: <input type="text" name="otro_hobby" value="<?php echo $otro_hobby; ?>">
        <br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>

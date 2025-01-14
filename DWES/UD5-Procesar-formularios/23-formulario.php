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

$errores = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $nivel_estudios = $_POST['nivel_estudios'] ?? '';
    $situacion = $_POST['situacion'] ?? [];
    $hobbies = $_POST['hobbies'] ?? [];
    $otro_hobby = $_POST['otro_hobby'] ?? '';

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
    if (empty($hobbies)) {
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
        <input type="text" name="nombre" id="nombre" >
        <br><br>

        <label for="email">Correo electrónico:</label>
        <input type="text" name="email" id="email" >
        <br><br>

        <label for="nivel_estudios">Nivel de estudios:</label>
        <select name="nivel_estudios" id="nivel_estudios">
            <option value="">Seleccione</option>
            <option value="Primaria">Primaria</option>
            <option value="Secundaria">Secundaria</option>
            <option value="Bachillerato">Bachillerato</option>
            <option value="FP">FP</option>
            <option value="Universitario">Universitario</option>
        </select>
        <br><br>

        <label>Situación actual:</label><br>
        <input type="checkbox" name="situacion[]" value="Estudiando" > Estudiando<br>
        <input type="checkbox" name="situacion[]" value="Trabajando" > Trabajando<br>
        <input type="checkbox" name="situacion[]" value="Buscando empleo"> Buscando empleo<br>
        <input type="checkbox" name="situacion[]" value="Desempleado"> Desempleado<br>
        <br><br>

        <label>Hobbies:</label><br>
        <input type="checkbox" name="hobbies[]" value="Leer"> Leer<br>
        <input type="checkbox" name="hobbies[]" value="Deporte" > Deporte<br>
        <input type="checkbox" name="hobbies[]" value="Música" > Música<br>
        <input type="checkbox" name="hobbies[]" value="Viajar" > Viajar<br>
        Otro: <input type="text" name="otro_hobby" >
        <br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>

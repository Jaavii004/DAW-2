<?php
/**
 * @Author: Javier Puertas
 */

// 24. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
// se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
// la información introducida por el usuario si no hay errores errores. Los datos a introducir son:
// Nombre, Apellidos, Edad, Peso (entre 10 y 150), Sexo, Estado Civil (Soltero, Casado, Viudo,
// Divorciado, Otro) Aficiones: Cine, Deporte, Literatura, Música, Cómics, Series, Videojuegos.
// Debe tener los botones de Enviar y Borrar

$errores = [];
$nombre = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$edad = $_POST['edad'] ?? '';
$peso = $_POST['peso'] ?? '';
$sexo = $_POST['sexo'] ?? '';
$estado_civil = $_POST['estado_civil'] ?? '';
$aficiones = $_POST['aficiones'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar nombre
    if (empty($nombre)) {
        $errores['nombre'] = 'El nombre es obligatorio.';
    }

    // Validar apellidos
    if (empty($apellidos)) {
        $errores['apellidos'] = 'Los apellidos son obligatorios.';
    }

    // Validar edad
    if (empty($edad) || $edad <= 0) {
        $errores['edad'] = 'La edad debe ser un positiva.';
    }

    // Validar peso
    if (empty($peso) || $peso < 10 || $peso > 150) {
        $errores['peso'] = 'El peso debe ser mayor que 10 y menor que 150.';
    }

    // Validar sexo
    if (empty($sexo)) {
        $errores['sexo'] = 'Debes seleccionar el sexo.';
    }

    // Validar estado civil
    if (empty($estado_civil)) {
        $errores['estado_civil'] = 'Debes seleccionar un estado civil.';
    }

    // Validar aficiones
    if (empty($aficiones)) {
        $errores['aficiones'] = 'Debes seleccionar al menos una afición.';
    }

    // Redirigir si no hay errores
    if (empty($errores)) {
        header("Location: 24-formulario-resultado.php?" . "nombre=$nombre&apellidos=$apellidos&edad=$edad&peso=$peso&sexo=$sexo&estado_civil=$estado_civil&aficiones=" . implode(',', $aficiones));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Recogida de Datos</title>
</head>
<body>
    <h1>Formulario de Recogida de Datos</h1>
    <form method="POST" action="">

        <ul style="color: red;">
            <?php foreach ($errores as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos"><br><br>

        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad"><br><br>

        <label for="peso">Peso (kg):</label>
        <input type="text" id="peso" name="peso"><br><br>

        <label>Sexo:</label>
        <input type="radio" name="sexo" value="Masculino"> Masculino
        <input type="radio" name="sexo" value="Femenino"> Femenino<br><br>

        <label for="estado_civil">Estado Civil:</label>
        <select id="estado_civil" name="estado_civil">
            <option value="">Seleccione</option>
            <option value="Soltero">Soltero</option>
            <option value="Casado">Casado</option>
            <option value="Viudo">Viudo</option>
            <option value="Divorciado">Divorciado</option>
            <option value="Otro">Otro</option>
        </select><br><br>

        <label>Aficiones:</label><br>
        <input type="checkbox" name="aficiones[]" value="Cine"> Cine<br>
        <input type="checkbox" name="aficiones[]" value="Deporte"> Deporte<br>
        <input type="checkbox" name="aficiones[]" value="Literatura"> Literatura<br>
        <input type="checkbox" name="aficiones[]" value="Música"> Música<br>
        <input type="checkbox" name="aficiones[]" value="Cómics"> Cómics<br>
        <input type="checkbox" name="aficiones[]" value="Series"> Series<br>
        <input type="checkbox" name="aficiones[]" value="Videojuegos"> Videojuegos<br><br>

        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
</body>
</html>
<?php
session_start();

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
        $errores['edad'] = 'La edad debe ser positiva.';
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
        $_SESSION['formulario'] = [
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'edad' => $edad,
            'peso' => $peso,
            'sexo' => $sexo,
            'estado_civil' => $estado_civil,
            'aficiones' => $aficiones
        ];
        header("Location: 12-24-exito.php");
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
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>"><br><br>

        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" value="<?php echo $edad; ?>"><br><br>

        <label for="peso">Peso (kg):</label>
        <input type="text" id="peso" name="peso" value="<?php echo $peso; ?>"><br><br>

        <label>Sexo:</label>
        <input type="radio" name="sexo" value="Masculino" <?php echo $sexo === 'Masculino' ? 'checked' : ''; ?>> Masculino
        <input type="radio" name="sexo" value="Femenino" <?php echo $sexo === 'Femenino' ? 'checked' : ''; ?>> Femenino<br><br>

        <label for="estado_civil">Estado Civil:</label>
        <select id="estado_civil" name="estado_civil">
            <option value="">Seleccione</option>
            <option value="Soltero" <?php echo $estado_civil === 'Soltero' ? 'selected' : ''; ?>>Soltero</option>
            <option value="Casado" <?php echo $estado_civil === 'Casado' ? 'selected' : ''; ?>>Casado</option>
            <option value="Viudo" <?php echo $estado_civil === 'Viudo' ? 'selected' : ''; ?>>Viudo</option>
            <option value="Divorciado" <?php echo $estado_civil === 'Divorciado' ? 'selected' : ''; ?>>Divorciado</option>
            <option value="Otro" <?php echo $estado_civil === 'Otro' ? 'selected' : ''; ?>>Otro</option>
        </select><br><br>

        <label>Aficiones:</label><br>
        <input type="checkbox" name="aficiones[]" value="Cine" <?php echo in_array('Cine', $aficiones) ? 'checked' : ''; ?>> Cine<br>
        <input type="checkbox" name="aficiones[]" value="Deporte" <?php echo in_array('Deporte', $aficiones) ? 'checked' : ''; ?>> Deporte<br>
        <input type="checkbox" name="aficiones[]" value="Literatura" <?php echo in_array('Literatura', $aficiones) ? 'checked' : ''; ?>> Literatura<br>
        <input type="checkbox" name="aficiones[]" value="Música" <?php echo in_array('Música', $aficiones) ? 'checked' : ''; ?>> Música<br>
        <input type="checkbox" name="aficiones[]" value="Cómics" <?php echo in_array('Cómics', $aficiones) ? 'checked' : ''; ?>> Cómics<br>
        <input type="checkbox" name="aficiones[]" value="Series" <?php echo in_array('Series', $aficiones) ? 'checked' : ''; ?>> Series<br>
        <input type="checkbox" name="aficiones[]" value="Videojuegos" <?php echo in_array('Videojuegos', $aficiones) ? 'checked' : ''; ?>> Videojuegos<br><br>

        <button type="submit">Enviar</button>
        <button type="reset">Borrar</button>
    </form>
</body>
</html>
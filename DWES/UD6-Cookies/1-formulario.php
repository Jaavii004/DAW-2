<?php

/**
 * @Author: Javier Puertas
 */

// Crea un formulario sencillo donde el usuario indique su nombre y seleccione si quiere un
// saludo o despedida. Se debe almacenar en una Cookie el usuario y el saludo y al pulsar Enviar,
// se debe indicar los valores actuales (usuario y saludo o despedida elegidos) y los valores del
// usuario anterior y acción elegida almacenadas en la Cookie.

// Recuperar los valores anteriores desde la cookie
$datos_anteriores = isset($_COOKIE['datos']) ? json_decode($_COOKIE['datos'], true) : ['usuario' => 'Ninguno', 'saludo' => 'Ninguna'];
$usuario_actual = $datos_anteriores['usuario'];
$saludo_actual = $datos_anteriores['saludo'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos_actuales = [
        'usuario' => $_POST['nombre'],
        'saludo' => $_POST['saludo']
    ];
    setcookie("datos", json_encode($datos_actuales), time() + 3600);

    $usuario_actual = $_POST['nombre'];
    $saludo_actual = $_POST['saludo'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Cookies</title>
</head>
<body>
    <h1>Formulario de Saludo o Despedida</h1>
    
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="saludo">Elige un saludo o despedida:</label>
        <select name="saludo" required>
            <option value="Saludo">Saludo</option>
            <option value="Despedida">Despedida</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Valores actuales:</h2>
    <p>Usuario actual: <?php echo $usuario_actual; ?></p>
    <p>Acción elegida: <?php echo $saludo_actual; ?></p>

    <h2>Valores anteriores (cookies):</h2>
    <p>Usuario anterior: <?php echo $datos_anteriores['usuario']; ?></p>
    <p>Acción anterior: <?php echo $datos_anteriores['saludo']; ?></p>
</body>
</html>

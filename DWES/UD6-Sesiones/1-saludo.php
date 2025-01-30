<?php
/**
 * @Author: Javier Puertas
 */

// Iniciar la sesión
session_start();

// Recuperar los valores anteriores de la sesión antes de sobrescribirlos
$usuario_anterior = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Ninguno';
$saludo_anterior = isset($_SESSION['saludo']) ? $_SESSION['saludo'] : 'Ninguna';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['usuario'] = $_POST['nombre'];
    $_SESSION['saludo'] = $_POST['saludo'];

    // Actualizar los valores actuales para mostrar
    $usuario_actual = $_POST['nombre'];
    $saludo_actual = $_POST['saludo'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Sesiones</title>
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

    <h2>Valores anteriores (sesión):</h2>
    <p>Usuario anterior: <?php echo $usuario_anterior; ?></p>
    <p>Acción anterior: <?php echo $saludo_anterior; ?></p>
</body>
</html>
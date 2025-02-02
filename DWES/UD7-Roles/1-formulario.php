<?php

/**
 * @Author: Javier Puertas
 *
 * Ejercicio 10 de la UD5 - Formulario de autenticación con redirección según rol
 */

session_start();

// Vector de empleados con salarios de ejemplo
$empleados = [
    ["nombre" => "Ana", "salario" => 1500],
    ["nombre" => "Carlos", "salario" => 2000],
    ["nombre" => "Beatriz", "salario" => 1800],
    ["nombre" => "David", "salario" => 2500]
];

// Función para calcular estadísticas salariales
function calcularEstadisticas($empleados) {
    $salarios = array_column($empleados, 'salario');
    return [
        'minimo' => min($salarios),
        'maximo' => max($salarios),
        'promedio' => array_sum($salarios) / count($salarios)
    ];
}

$estadisticas = calcularEstadisticas($empleados);

// Si ya hay una sesión activa, redirigir al usuario
if (isset($_SESSION['usuario']) && isset($_SESSION['perfil'])) {
    header("Location: {$_SESSION['perfil']}.php");
    exit();
}

// Procesar el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $perfil = $_POST['perfil'] ?? '';

    if (!empty($usuario) && in_array($perfil, ['gerente', 'sindicalista', 'nominas'])) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['perfil'] = $perfil;
        header("Location: $perfil.php");
        exit();
    } else {
        $error = "Datos incorrectos. Inténtelo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Empresa - Javier Puertas</title>
</head>
<body>
    <h1>Formulario de Acceso - Empresa</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="usuario" required>
        <label>Perfil:</label>
        <select name="perfil">
            <option value="gerente">Gerente</option>
            <option value="sindicalista">Sindicalista</option>
            <option value="nominas">Responsable de Nóminas</option>
        </select>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

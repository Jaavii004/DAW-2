<?php
session_start();

// Datos de empleados y salarios
$empleados = [
    "Juan" => 2000,
    "Ana" => 2500,
    "Carlos" => 1800,
    "Maria" => 2200,
    "Luis" => 2700
];

// Funciones para calcular salarios
function salario_minimo($empleados) {
    return min($empleados);
}

function salario_maximo($empleados) {
    return max($empleados);
}

function salario_medio($empleados) {
    return array_sum($empleados) / count($empleados);
}

// Verificar si el usuario ha iniciado sesión
if (isset($_POST['nombre']) && isset($_POST['perfil'])) {
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['perfil'] = $_POST['perfil'];
}

if (!isset($_SESSION['nombre']) || !isset($_SESSION['perfil'])) {
    header("Location: index.php");
    exit;
}

// Obtener datos del usuario
$nombre = $_SESSION['nombre'];
$perfil = $_SESSION['perfil'];

// Redirigir según perfil
switch ($perfil) {
    case "Gerente":
        $salario_min = salario_minimo($empleados);
        $salario_max = salario_maximo($empleados);
        $salario_medio = salario_medio($empleados);
        break;
    case "Sindicalista":
        $salario_medio = salario_medio($empleados);
        break;
    case "Responsable de Nóminas":
        $salario_min = salario_minimo($empleados);
        $salario_max = salario_maximo($empleados);
        break;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - <?php echo $perfil; ?> - Empresa Oliplus</title>
</head>
<body>
    <h1>Panel de Control - <?php echo $perfil; ?> - Empresa Oliplus</h1>
    <p>Bienvenido, <?php echo $nombre; ?>!</p>
    
    <?php
    // Mostrar datos según el perfil
    if ($perfil == "Gerente") {
        echo "<h2>Datos Salariales:</h2>";
        echo "Salario mínimo: " . $salario_min . "<br>";
        echo "Salario máximo: " . $salario_max . "<br>";
        echo "Salario medio: " . $salario_medio . "<br>";
    } elseif ($perfil == "Sindicalista") {
        echo "<h2>Datos Salariales:</h2>";
        echo "Salario medio: " . $salario_medio . "<br>";
    } elseif ($perfil == "Responsable de Nóminas") {
        echo "<h2>Datos Salariales:</h2>";
        echo "Salario mínimo: " . $salario_min . "<br>";
        echo "Salario máximo: " . $salario_max . "<br>";
    }
    ?>

</body>
</html>

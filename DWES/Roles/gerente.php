<?php
session_start();
if (!isset($_SESSION["nombre"]) || $_SESSION["perfil"] !== "Gerente") {
    header("Location: index.php");
    exit();
}
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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Gerente</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["nombre"]; ?> (Gerente)</h1>
    <p>Contenido exclusivo para gerentes.</p>
    <?php
        echo "<h2>Datos Salariales:</h2>";
        echo "Salario mínimo: " . salario_minimo($empleados) . "€<br>";
        echo "Salario máximo: " . salario_maximo($empleados) . "€<br>";
        echo "Salario medio: " . salario_medio($empleados) . "€<br>";
    ?>

    <form action="logout.php" method="POST">
        <input type="submit" value="Cerrar sesión">
    </form>
</body>
</html>

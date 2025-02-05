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

// Variable para almacenar el salario seleccionado
$salario_mostrar = [];

// Si se envía el formulario con la selección de mostrar el salario
if (isset($_POST['salario'])) {
    $salario_mostrar = $_POST['salario'];
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
        
    <form method="POST">
        <label for="salario">Selecciona qué salario mostrar: </label>
        <br>
        <select name="salario[]" id="salario" multiple>
            <option value="minimo" <?php echo (in_array('minimo', $salario_mostrar)) ? 'selected' : ''; ?>>Salario Mínimo</option>
            <option value="maximo" <?php echo (in_array('maximo', $salario_mostrar)) ? 'selected' : ''; ?>>Salario Máximo</option>
            <option value="medio" <?php echo (in_array('medio', $salario_mostrar)) ? 'selected' : ''; ?>>Salario Medio</option>
        </select>
        <br>
        <input type="submit" value="Mostrar salario">
    </form>
    <br>
    <h2>Datos Salariales:</h2>

    <p>
        <?php
        if (in_array('minimo', $salario_mostrar)) {
            echo "Salario mínimo: " . salario_minimo($empleados) . "€";
            echo "<br>";
        } 
        if (in_array('maximo', $salario_mostrar)) {
            echo "Salario máximo: " . salario_maximo($empleados) . "€";
            echo "<br>";
        } 
        if (in_array('medio', $salario_mostrar)) {
            echo "Salario medio: " . salario_medio($empleados) . "€";
            echo "<br>";
        }
        ?>
    </p>

    <!-- Lista de todos los empleados y sus salarios -->
    <h3>Lista de empleados y salarios:</h3>
    <ul>
        <?php
            foreach ($empleados as $nombre => $salario) {
                echo "<li>$nombre - $salario €</li>";
            }
        ?>
    </ul>

    <form action="logout.php" method="POST">
        <input type="submit" value="Cerrar sesión">
    </form>
</body>
</html>

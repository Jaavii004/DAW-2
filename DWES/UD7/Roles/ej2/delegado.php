<?php

/**
 * @Author: Javier Puertas
 */

session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Delegado</title>
</head>
<body>
    <h2>Bienvenido Delegado: <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido']; ?></h2>
    <p>Asignatura: <?php echo $_SESSION['asignatura']; ?></p>
    <p>Grupo: <?php echo $_SESSION['grupo']; ?></p>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
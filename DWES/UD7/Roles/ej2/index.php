<?php

/**
 * @Author: Javier Puertas
 */

session_start();

$errores = [];
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['apellido'] = $_POST['apellido'];
$_SESSION['asignatura'] = $_POST['asignatura'];
$_SESSION['grupo'] = $_POST['grupo'];
$_SESSION['edad'] = $_POST['edad'];
$_SESSION['cargo'] = $_POST['cargo'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nombre'])) {
        $errores[] = "El campo Nombre es obligatorio";
    }
    if (empty($_POST['apellido'])) {
        $errores[] = "El campo Apellido es obligatorio";
    }
    if (empty($_POST['asignatura'])) {
        $errores[] = "El campo Asignatura es obligatorio";
    }
    if (empty($_POST['grupo'])) {
        $errores[] = "El campo Grupo es obligatorio";
    }

    // Comprobar que la edad y cargo estén seleccionados
    if (empty($_POST['edad'])) {
        $errores[] = "El campo Edad es obligatorio";
    }
    if (empty($_POST['cargo'])) {
        $errores[] = "El campo Cargo es obligatorio";
    }

    if (empty($errores)) {
        // Si no hay errores, redirigir según los valores de edad y cargo
        if ($_POST['edad'] == 'menor' && $_POST['cargo'] == 'con_cargo') {
            header("Location: delegado.php");
        } elseif ($_POST['edad'] == 'menor' && $_POST['cargo'] == 'sin_cargo') {
            header("Location: estudiante.php");
        } elseif ($_POST['edad'] == 'mayor' && $_POST['cargo'] == 'sin_cargo') {
            header("Location: profesor.php");
        } elseif ($_POST['edad'] == 'mayor' && $_POST['cargo'] == 'con_cargo') {
            header("Location: director.php");
        }
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Identificación</title>
</head>

<body>
    <ul style="color: red;">
        <?php
        // Mostrar los errores si existen
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        ?>
    </ul>
    <h2>Formulario de Identificación</h2>
    <form action="index.php" method="post">
        Nombre:
        <input type="text" name="nombre" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>"><br>
        Apellido:
        <input type="text" name="apellido" value="<?php echo isset($_SESSION['apellido']) ? $_SESSION['apellido'] : ''; ?>"><br>
        Asignatura:
        <input type="text" name="asignatura" value="<?php echo isset($_SESSION['asignatura']) ? $_SESSION['asignatura'] : ''; ?>"><br>
        Grupo:
        <input type="text" name="grupo" value="<?php echo isset($_SESSION['grupo']) ? $_SESSION['grupo'] : ''; ?>"><br>
        Edad:
        <input type="radio" name="edad" value="mayor" <?php echo (isset($_SESSION['edad']) && $_SESSION['edad'] == 'mayor') ? 'checked' : ''; ?>> Mayor de edad
        <input type="radio" name="edad" value="menor" <?php echo (isset($_SESSION['edad']) && $_SESSION['edad'] == 'menor') ? 'checked' : ''; ?>> Menor de edad<br>
        Cargo:
        <input type="radio" name="cargo" value="con_cargo" <?php echo (isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'con_cargo') ? 'checked' : ''; ?>> Con cargo
        <input type="radio" name="cargo" value="sin_cargo" <?php echo (isset($_SESSION['cargo']) && $_SESSION['cargo'] == 'sin_cargo') ? 'checked' : ''; ?>> Sin cargo<br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>

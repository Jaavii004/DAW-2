<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $perfil = $_POST["perfil"];
    
    $_SESSION["nombre"] = $nombre;
    $_SESSION["perfil"] = $perfil;
    
    switch ($perfil) {
        case "Gerente":
            header("Location: gerente.php");
            break;
        case "Sindicalista":
            header("Location: sindicalista.php");
            break;
        case "Responsable de Nóminas":
            header("Location: nominas.php");
            break;
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Autenticación - Empresa XYZ</title>
</head>
<body>
    <h1>Formulario de Autenticación - Empresa XYZ</h1>
    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="perfil">Perfil:</label>
        <select name="perfil" id="perfil" required>
            <option value="Gerente">Gerente</option>
            <option value="Sindicalista">Sindicalista</option>
            <option value="Responsable de Nóminas">Responsable de Nóminas</option>
        </select><br><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
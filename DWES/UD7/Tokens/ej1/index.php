<?php
/**
 * @Author: Javier Puertas
 */

session_start();
// Generar un nuevo token único para la sesión si no existe
if (!isset($_SESSION["token"])) {
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(24));
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["inises"])) {
    // Verificar el token de sesión
    if (!isset($_POST["token"]) || $_POST["token"] !== $_SESSION["token"]) {
        echo "Token de sesión no válido.";
        exit();
    } else {
        // Verificar que los campos necesarios estén rellenados
        $nombre = $_POST["nombre"];
        $perfil = $_POST["perfil"];

        if (empty($nombre) || empty($perfil)) {
            echo "Todos los campos deben ser completados.";
            exit();
        }

        // Guardar los datos del usuario en la sesión
        $_SESSION["nombre"] = $nombre;
        $_SESSION["perfil"] = $perfil;

        // Redirigir al usuario según el perfil
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
}


// Si el botón "Cambiar SID" es presionado, se genera un nuevo token
if (isset($_POST['cambiar_sid'])) {
    // Verificar el token antes de cambiar SID
    if (!isset($_POST["token"]) || $_POST["token"] !== $_SESSION["token"]) {
        echo "Token de sesión no válido.";
        exit();
    }

    $_SESSION["token"] =  bin2hex(openssl_random_pseudo_bytes(24));
    echo "El token de sesión ha sido cambiado.";
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
        <input type="text" id="nombre" name="nombre" ><br><br>
        <label for="perfil">Perfil:</label>
        <select name="perfil" id="perfil" required>
            <option value="Gerente">Gerente</option>
            <option value="Sindicalista">Sindicalista</option>
            <option value="Responsable de Nóminas">Responsable de Nóminas</option>
        </select><br><br>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        
        <input type="submit" name="inises" value="Iniciar sesión">
        <input type="submit" name="cambiar_sid" value="Cambiar SID">
    </form>

    <?php
    // Mostrar el token actual de la sesión
    if (isset($_SESSION["token"])) {
        echo "<p>Token actual de sesión: " . $_SESSION["token"] . "</p>";
    }
    ?>
</body>
</html>

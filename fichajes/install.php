<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $baseDir = __DIR__ . '/sistema_fichajes';
    $dbConfig = $_POST['db'];
    $adminUser = trim($_POST['admin_user']);
    $adminPass = password_hash($_POST['admin_pass'], PASSWORD_BCRYPT);

    try {
        // 1. Crear directorios
        $dirs = [
            '',
            '/assets/css',
            '/includes',
            '/processes'
        ];
        
        foreach ($dirs as $dir) {
            $path = $baseDir . $dir;
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        }

        // 2. Crear archivos esenciales
        $files = [
            '/index.php' => '<?php header("Location: login.php"); exit();',
            
            '/login.php' => '<?php session_start(); include "includes/header.php"; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <form action="processes/login.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Usuario</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>',

            '/dashboard.php' => '<?php 
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
include "includes/header.php";
include "includes/db.php";
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Fichar Entrada/Salida</h5>
                    <form action="processes/checkin.php" method="post">
                        <?php if (!isset($_SESSION["clocked_in"])): ?>
                            <button type="submit" name="action" value="in" class="btn btn-light w-100">Fichar Entrada</button>
                        <?php else: ?>
                            <button type="submit" name="action" value="out" class="btn btn-danger w-100">Fichar Salida</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>',

            '/includes/header.php' => '<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Fichajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { margin-top: 2rem; box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Sistema Fichajes</a>
        <?php if (isset($_SESSION["user_id"])): ?>
        <div class="d-flex">
            <a href="logout.php" class="btn btn-outline-light">Cerrar Sesión</a>
        </div>
        <?php endif; ?>
    </div>
</nav>',

            '/includes/footer.php' => '</body>
</html>',

            '/includes/db.php' => '<?php
$host = "' . $dbConfig['host'] . '";
$dbname = "' . $dbConfig['name'] . '";
$user = "' . $dbConfig['user'] . '";
$pass = "' . $dbConfig['pass'] . '";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>',

            '/processes/login.php' => '<?php
session_start();
include "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["rol"] = $user["rol"];
        header("Location: ../dashboard.php");
        exit();
    } else {
        header("Location: ../login.php?error=1");
        exit();
    }
}
?>',

            '/processes/checkin.php' => '<?php
session_start();
include "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
    $action = $_POST["action"];
    $userId = $_SESSION["user_id"];
    
    if ($action == "in") {
        $stmt = $pdo->prepare("INSERT INTO registros (usuario_id, clock_in) VALUES (?, NOW())");
        $stmt->execute([$userId]);
        $_SESSION["clocked_in"] = true;
    } elseif ($action == "out") {
        $stmt = $pdo->prepare("UPDATE registros SET clock_out = NOW() WHERE usuario_id = ? AND clock_out IS NULL");
        $stmt->execute([$userId]);
        unset($_SESSION["clocked_in"]);
    }
    
    header("Location: ../dashboard.php");
    exit();
}
?>',

            '/logout.php' => '<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>'
        ];

        foreach ($files as $path => $content) {
            file_put_contents($baseDir . $path, $content);
        }

        // 3. Crear base de datos y tablas
        $dsn = "mysql:host={$dbConfig['host']};charset=utf8mb4";
        $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbConfig['name']}`");
        $pdo->exec("USE `{$dbConfig['name']}`");
        
        $pdo->exec("
        CREATE TABLE IF NOT EXISTS usuarios (
            id INT PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL,
            rol ENUM('empleado', 'admin') DEFAULT 'empleado',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        
        CREATE TABLE IF NOT EXISTS registros (
            id INT PRIMARY KEY AUTO_INCREMENT,
            usuario_id INT NOT NULL,
            clock_in DATETIME NOT NULL,
            clock_out DATETIME DEFAULT NULL,
            FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
        );
        ");

        // 4. Insertar usuario admin
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password, email, rol) VALUES (?, ?, ?, 'admin')");
        $stmt->execute([$adminUser, $adminPass, "admin@{$dbConfig['name']}.com"]);

        $success = true;

    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    } catch (Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Instalador Sistema Fichajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Instalación del Sistema de Fichajes</h3>
                </div>
                <div class="card-body">
                    <?php if(isset($success)): ?>
                        <div class="alert alert-success">
                            <h4>✅ Instalación completada!</h4>
                            <p>Sistema instalado correctamente en: <code>sistema_fichajes</code></p>
                            <a href="sistema_fichajes/login.php" class="btn btn-success">
                                Ir al Sistema
                            </a>
                        </div>
                    <?php elseif(isset($error)): ?>
                        <div class="alert alert-danger">
                            <h4>❌ Error en la instalación</h4>
                            <pre><?= htmlspecialchars($error) ?></pre>
                        </div>
                    <?php else: ?>
                        <form method="post">
                            <h4>Configuración de la Base de Datos</h4>
                            <div class="mb-3">
                                <label class="form-label">Host de MySQL:</label>
                                <input type="text" name="db[host]" class="form-control" value="localhost" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre de la BD:</label>
                                    <input type="text" name="db[name]" class="form-control" value="sistema_fichajes" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Usuario MySQL:</label>
                                    <input type="text" name="db[user]" class="form-control" value="root" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Contraseña MySQL:</label>
                                <input type="password" name="db[pass]" class="form-control">
                            </div>

                            <hr>
                            
                            <h4>Cuenta de Administrador</h4>
                            <div class="mb-3">
                                <label class="form-label">Usuario Admin:</label>
                                <input type="text" name="admin_user" class="form-control" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Contraseña Admin:</label>
                                <input type="password" name="admin_pass" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                Instalar Sistema
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
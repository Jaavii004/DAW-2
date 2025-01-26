<?php
require 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        $_SESSION['success'] = 'Registro exitoso. Por favor inicia sesión';
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        if($e->errorInfo[1] === 1062) {
            $_SESSION['error'] = 'El nombre de usuario o email ya existe';
        } else {
            $_SESSION['error'] = 'Error en el registro: ' . $e->getMessage();
        }
        header("Location: registro.php");
        exit();
    }
}
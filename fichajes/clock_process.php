<?php
require 'config.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $userId = $_SESSION['user_id'];
    
    try {
        if($action === 'clock_in') {
            // Verificar si ya tiene un fichaje activo
            $stmt = $pdo->prepare("SELECT id FROM registros WHERE usuario_id = ? AND clock_out IS NULL");
            $stmt->execute([$userId]);
            if($stmt->fetch()) {
                throw new Exception('Ya tienes una entrada registrada sin salida');
            }
            
            $stmt = $pdo->prepare("INSERT INTO registros (usuario_id, clock_in, notas) VALUES (?, NOW(), ?)");
            $stmt->execute([$userId, $_POST['notas'] ?? '']);
            
            $_SESSION['success'] = 'Entrada registrada correctamente';
            
        } elseif($action === 'clock_out') {
            $stmt = $pdo->prepare("UPDATE registros SET clock_out = NOW() WHERE usuario_id = ? AND clock_out IS NULL ORDER BY clock_in DESC LIMIT 1");
            $stmt->execute([$userId]);
            
            if($stmt->rowCount() === 0) {
                throw new Exception('No se encontró una entrada para registrar la salida');
            }
            
            $_SESSION['success'] = 'Salida registrada correctamente';
        }
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }
}

header("Location: dashboard.php");
exit();
<?php

/**
 * @Author: Javier Puertas
 */

session_start();
session_destroy(); // Destruye la sesión
header("Location: index.php"); // Redirige al formulario
exit;
?>

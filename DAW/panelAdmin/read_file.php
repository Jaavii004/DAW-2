<?php
if (isset($_GET['file'])) {
    $file = './' . $_GET['file']; // Ajusta esta ruta al directorio de tus archivos
    if (file_exists($file)) {
        echo htmlspecialchars(file_get_contents($file));
    } else {
        echo 'Archivo no encontrado.';
    }
}
?>

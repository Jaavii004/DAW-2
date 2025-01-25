<?php

require_once 'Logger.php';

try {
    // Crea una instancia de la clase Logger
    $logger = new Logger('log', 'DEBUG');

    // Registrar algunos mensajes de log
    $logger->logInfo('Este es un mensaje de info.');
    $logger->logWarning('Este es un mensaje de advertencia.');
    $logger->logError('Este es un mensaje de error.');
    $logger->logDebug('Este es un mensaje de depuración.');

    // Ver el contenido del log
    echo nl2br($logger->getLogs());
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

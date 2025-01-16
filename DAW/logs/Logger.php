<?php

class Logger {
    private $logFile;
    private $logLevel;
    private $logDir;

    const LEVELS = ['INFO', 'WARNING', 'ERROR', 'DEBUG'];

    // Constructor con parámetros para logDir y logLevel
    public function __construct($logDir = 'log', $logLevel = 'INFO') {
        if (!$this->isValidLogLevel($logLevel)) {
            throw new InvalidArgumentException("Nivel de log no válido.");
        }

        $this->logDir = rtrim($logDir, '/') . '/'; // Asegura que la ruta termina con '/'
        $this->logLevel = strtoupper($logLevel);

        // Asegura que la carpeta de logs exista
        if (!is_dir($this->logDir)) {
            mkdir($this->logDir, 0777, true);
        }

        // Genera el nombre de archivo basado en la fecha
        $date = date('Y-m-d');
        $this->logFile = $this->logDir . "access_warning_{$date}.log";
    }

    // Verifica si el nivel de log es válido
    private function isValidLogLevel($logLevel) {
        return in_array(strtoupper($logLevel), self::LEVELS);
    }

    // Escribe el log en el archivo, asegurando que no sobrescriba
    private function writeLog($message, $level) {
        $currentDate = date('Y-m-d H:i:s');  // Fecha y hora actuales
        $formattedMessage = "[$currentDate] [$level] $message" . PHP_EOL;
        
        // Agrega al final del archivo, no sobrescribe
        file_put_contents($this->logFile, $formattedMessage, FILE_APPEND);
    }

    // Filtra los logs por nivel
    private function shouldLog($level) {
        $levelIndex = array_search(strtoupper($this->logLevel), self::LEVELS);
        $messageLevelIndex = array_search(strtoupper($level), self::LEVELS);

        return $messageLevelIndex >= $levelIndex;
    }

    // Métodos para los diferentes niveles de log
    public function logInfo($message) {
        if ($this->shouldLog('INFO')) {
            $this->writeLog($message, 'INFO');
        }
    }

    public function logWarning($message) {
        if ($this->shouldLog('WARNING')) {
            $this->writeLog($message, 'WARNING');
        }
    }

    public function logError($message) {
        if ($this->shouldLog('ERROR')) {
            $this->writeLog($message, 'ERROR');
        }
    }

    public function logDebug($message) {
        if ($this->shouldLog('DEBUG')) {
            $this->writeLog($message, 'DEBUG');
        }
    }

    // Método para obtener el contenido del log (por si lo necesitas)
    public function getLogs() {
        return file_get_contents($this->logFile);
    }

    // Método para limpiar el archivo de logs
    public function clearLogs() {
        file_put_contents($this->logFile, '');
    }
}

?>

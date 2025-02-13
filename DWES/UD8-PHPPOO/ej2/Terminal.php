<?php

/**
 * @Author: Javier Puertas
 */

// Clase base Terminal
class Terminal {
    protected $numero;
    protected $tiempoConversacion; // Total tiempo de conversación en segundos

    public function __construct($numero) {
        $this->numero = $numero;
        $this->tiempoConversacion = 0;
    }

    public function __toString() {
        $minutos = floor($this->tiempoConversacion / 60);
        $segundos = $this->tiempoConversacion % 60;
        return "Nº $this->numero – " . $minutos . " m y " . $segundos . "s de conversación en total";
    }

    // Método para actualizar el tiempo de conversación
    public function actualizarTiempo($segundos) {
        $this->tiempoConversacion += $segundos;
    }
}
?>

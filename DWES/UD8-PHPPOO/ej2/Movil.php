<?php
// Clase Movil hereda de Terminal
include "Terminal.php";

class Movil extends Terminal {
    private $tarifa; // "rata", "mono", "bisonte"
    private $tarificados; // Tiempo en segundos de conversación tarificado

    public function __construct($numero, $tarifa) {
        parent::__construct($numero); // Llamamos al constructor de la clase base
        $this->tarifa = $tarifa;
        $this->tarificados = 0;
    }

    public function __toString() {
        $minutosConversacion = floor($this->tiempoConversacion / 60);
        $segundosConversacion = $this->tiempoConversacion % 60;
        $minutosTarificados = floor($this->tarificados / 60);
        $segundosTarificados = $this->tarificados % 60;

        // Calcular el importe
        $costePorMinuto = $this->calcularCostePorMinuto();
        $importe = ($this->tarificados / 60) * $costePorMinuto;

        return "Nº $this->numero – $minutosConversacion m y $segundosConversacion s de conversación en total - tarificados $minutosTarificados m y $segundosTarificados s por un importe de " . number_format($importe, 2) . " euros";
    }

    private function calcularCostePorMinuto() {
        // Definir coste por minuto según la tarifa
        switch ($this->tarifa) {
            case "rata":
                return 0.06; // 6 céntimos por minuto
            case "mono":
                return 0.12; // 12 céntimos por minuto
            case "bisonte":
                return 0.30; // 30 céntimos por minuto
            default:
                return 0;
        }
    }

    // Método llama para realizar la llamada
    public function llama($terminal, $segundosDeLlamada) {
        // Actualizamos el tiempo de conversación de ambos terminales
        $this->actualizarTiempo($segundosDeLlamada);
        $this->tarificados += $segundosDeLlamada;

        // El receptor no tiene que actualizar su tiempo de llamada
        // solo el que llama (este)
    }
}
?>

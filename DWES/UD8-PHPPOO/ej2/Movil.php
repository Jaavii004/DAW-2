<?php
// Clase Movil hereda de Terminal
include "Terminal.php";

class Movil extends Terminal {
    private $tarifa; // "rata", "mono", "bisonte"
    private $segundosTarificados; // Tiempo tarificado en segundos
    private $importeTarificado; // Coste total de llamadas en euros

    public function __construct($numero, $tarifa) {
        parent::__construct($numero); // Llamamos al constructor de la clase base
        $this->tarifa = $tarifa;
        $this->segundosTarificados = 0;
        $this->importeTarificado = 0;
    }

    public function __toString() {
        $minutosConversacion = floor($this->tiempoConversacion / 60);
        $segundosConversacion = $this->tiempoConversacion % 60;
        $minutosTarificados = floor($this->segundosTarificados / 60);
        $segundosTarificados = $this->segundosTarificados % 60;

        return "Nº $this->numero – $minutosConversacion m y $segundosConversacion s de conversación en total - tarificados $minutosTarificados m y $segundosTarificados s por un importe de " . number_format($this->importeTarificado, 2) . " euros<br>";
    }

    private function calcularCostePorSegundo() {
        // Definir coste por segundo según la tarifa
        switch ($this->tarifa) {
            case "rata":
                return 0.06 / 60; // 6 céntimos por minuto
            case "mono":
                return 0.12 / 60; // 12 céntimos por minuto
            case "bisonte":
                return 0.30 / 60; // 30 céntimos por minuto
            default:
                return 0;
        }
    }

    // Método llama para realizar la llamada
    public function llama($terminal, $segundosDeLlamada) {
        // Actualizamos el tiempo de conversación de ambos terminales
        $this->actualizarTiempo($segundosDeLlamada);
        $terminal->actualizarTiempo($segundosDeLlamada);

        // Calcular coste de la llamada
        $costeLlamada = $this->calcularCostePorSegundo() * $segundosDeLlamada;

        // Acumular el importe y tiempo tarificado en el móvil que llama
        $this->importeTarificado += $costeLlamada;
        $this->segundosTarificados += $segundosDeLlamada;
    }
}
?>

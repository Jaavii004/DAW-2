<?php

/**
 * @Author: Javier Puertas
 */

/**
* Clase que representa una incidencia en el sistema.
*/
class Incidencia {
    private static $contador = 1;  // Contador estático para generar los códigos de incidencia.
    private static $pendientes = 0;  // Contador estático de incidencias pendientes.
    
    private $codigo;
    private $puesto;
    private $descripcion;
    private $estado;
    private $resolucion;

    /**
     * Constructor de la clase.
     * @param int $puesto El número del puesto donde se presenta la incidencia.
     * @param string $descripcion Descripción de la incidencia.
     */
    public function __construct($puesto, $descripcion) {
        $this->codigo = self::$contador++;  // Asigna un código único.
        $this->puesto = $puesto;
        $this->descripcion = $descripcion;
        $this->estado = "Pendiente";  // El estado por defecto es "Pendiente".
        $this->resolucion = null;
        
        // Aumenta el contador de incidencias pendientes.
        self::$pendientes++;
    }

    /**
     * Resuelve la incidencia y cambia su estado a "Resuelta".
     * @param string $resolucion Descripción de cómo se resolvió la incidencia.
     */
    public function resuelve($resolucion) {
        $this->estado = "Resuelta";
        $this->resolucion = $resolucion;
        
        // Disminuye el contador de incidencias pendientes.
        self::$pendientes--;
    }

    /**
     * Obtiene la cantidad de incidencias pendientes.
     * @return int El número de incidencias pendientes.
     */
    public static function getPendientes() {
        return self::$pendientes;
    }

    /**
     * Imprime la información de la incidencia en formato adecuado.
     * @return string Representación de la incidencia.
     */
    public function __toString() {
        $resultado = "Incidencia {$this->codigo} - Puesto: {$this->puesto} - {$this->descripcion} - {$this->estado}";
        
        // Si la incidencia está resuelta, añade la resolución.
        if ($this->estado === "Resuelta") {
            $resultado .= " - {$this->resolucion}";
        }
        
        return $resultado . "<br>";
    }
}
?>

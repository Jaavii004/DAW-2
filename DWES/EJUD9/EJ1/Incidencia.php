<?php
/**
 * @Author: Javier Puertas
 */

include_once __DIR__ ."/traitDB.php";

class Incidencia {
    use TraitDB;
    public static $contador = 1;
    public static $pendientes = 0;
    private $codigo;
    private $problema;
    private $estado;
    private $puesto;
    private $resolucion;

    public function getProblema() {
        return $this->problema;
    }

    public function setProblema($problema) {
        $this->problema = $problema;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        if ($estado == 'pendiente' && $this->estado != 'pendiente') {
            self::$pendientes++;
        } 

        if ($this->estado == 'pendiente' && $estado != 'pendiente') {
            self::$pendientes--;
        }
        $this->estado = $estado;
    }

    public function getPuesto() {
        return $this->puesto;
    }

    public function setPuesto($puesto) {
        $this->puesto = $puesto;
    }

    public function getResolucion() {
        return $this->resolucion;
    }

    public function setResolucion($resolucion) {
        $this->resolucion = $resolucion;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public static function getPendientes() {
        return self::$pendientes . "\n";
    }

    public function __construct($problema, $puesto) {
        $this->problema = $problema;
        $this->puesto = $puesto;
        $this->estado = "pendiente";
        $this->codigo = self::$contador;
    }

    public static function creaIncidencia($puesto, $problema) {
        $sql = "INSERT INTO INCIDENCIA (CODIGO, PROBLEMA, PUESTO, ESTADO) 
            VALUES (:CODIGO, :PROBLEMA, :PUESTO, 'pendiente')";
    
        $params = [
            ':CODIGO' => self::$contador,
            ':PROBLEMA' => $problema,
            ':PUESTO' => $puesto
        ];
    
        try {
            $result = self::queryPreparadaDB($sql, $params);
            
            if ($result) {
                echo "La incidencia " . self::$contador . " creada correctamente.\n";
                self::$contador++;
                self::$pendientes++;
                return self::obtenerPorCodigo(self::$contador - 1);
            } else {
                echo "La incidencia " . self::$contador . " no se ha podido crear.\n";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al crear la consulta: " . $e->getMessage();
            return false;
        }
    }    

    private static function obtenerPorCodigo($codigo) {
        $sql = "SELECT * FROM INCIDENCIA WHERE CODIGO = :CODIGO";
        $params = [':CODIGO' => $codigo];
        $result = self::queryPreparadaDB($sql, $params);
        
        if (!empty($result)) {
            $row = $result[0];
            return new self(
                $row['CODIGO'],
                $row['PROBLEMA']
            );
        }
        return null;
    }

    public function resuelve($resolucion) {
        $sql = "UPDATE INCIDENCIA 
                SET ESTADO = 'resuelta', RESOLUCION = :RESOLUCION
                WHERE CODIGO = :CODIGO";
        
        $params = [
            ':RESOLUCION' => $resolucion,
            ':CODIGO' => $this->getCodigo()
        ];
        
        if (self::queryPreparadaDB($sql, $params)) {
            echo "Incidencia {$this->getCodigo()} resuelta.\n";
            $this->setEstado('resuelta');
            return true;
        }
        echo "Error al resolver incidencia.\n";
        return false;
    }

    public static function leeIncidencia($codigo) {
        $incidencia = self::obtenerPorCodigo($codigo);
        if ($incidencia) {
            echo $incidencia;
        } else {
            echo "Incidencia no encontrada.\n";
        }
    }

    public static function leeTodasIncidencias() {
        $sql = "SELECT * FROM INCIDENCIA";
        $result = self::queryPreparadaDB($sql, []);
        
        foreach ($result as $row) {
            $incidencia = new self(
                $row['CODIGO'],
                $row['PROBLEMA']
            );
            echo $incidencia;
        }
    }

    public function actualizaIncidencia($nuevo_puesto, $nueva_resolucion, $nuevo_problema, $nuevo_estado){
        $sql = "UPDATE INCIDENCIA SET ";
        $params = [':CODIGO' => $this->getCodigo()];
        $quieresActualizar = false;

        if (!empty($nuevo_problema)) {
            $sql .= "PROBLEMA = :PROBLEMA";
            $params[':PROBLEMA'] = $nuevo_problema;
            $quieresActualizar = true;
        }
        
        if (!empty($nueva_resolucion)) {
            $sql .= "RESOLUCION = :RESOLUCION";
            $params[':RESOLUCION'] = $nueva_resolucion;
            $quieresActualizar = true;
        }
        
        if (!empty($nuevo_estado) && in_array($nuevo_estado, ['pendiente', 'resuelta'])) {
            $sql .= "ESTADO = :ESTADO";
            $params[':ESTADO'] = $nuevo_estado;
            $quieresActualizar = true;
        }

        if (!empty($nuevo_puesto)) {
            $sql .= "PUESTO = :PUESTO";
            $params[':PUESTO'] = $nuevo_puesto;
            $quieresActualizar = true;
        }

        if (!$quieresActualizar) {
            echo "No se ha actualizado nada.\n";
            return false;
        }

        $sql .= " WHERE CODIGO = :CODIGO";
        if (self::queryPreparadaDB($sql, $params)) {
            echo "Incidencia actualizada.\n";
            self::leeIncidencia($this->getCodigo());
            return true;
        }
        return false;
    }

    public function borraIncidencia() {
        $sql = "DELETE FROM INCIDENCIA WHERE CODIGO = :CODIGO";
        $params = [':CODIGO' => $this->getCodigo()];
        
        if (self::queryPreparadaDB($sql, $params)) {
            echo "La incidencia" . $this->getCodigo() . " se ha borrado correctamente.\n";
            self::leeTodasIncidencias();
        } else {
            echo "Error al borrar la incidencia " . $this->getCodigo() . ".\n";
        }
    }

    public function __toString() {
        $output = "Código: {$this->getCodigo()}\n";
        $output .= "Descripción: {$this->problema}\n";
        $output .= "Estado: {$this->estado}\n";
    
        if ($this->estado === 'resuelta') {
            $output .= "Solución: {$this->resolucion}\n";
        }
    
        return $output . "\n";
    }
}
?>

<?php
/**
 * 
 */

include_once __DIR__ ."/traitDB.php";

class Incidencia {
    use TraitDB;
    public static $contador = 1;
    private $codigo;
    private $problema;
    private $estado;
    private $puesto;
    private $resolucion;

    public function __construct($codigo, $problema, $resolucion, $puesto, $estado = "pendiente") {
        $this->codigo = $codigo;
        $this->problema = $problema;
        $this->resolucion = $resolucion;
        $this->puesto = $puesto;
        $this->estado = $estado;
    }

    public static function creaIncidencia($puesto, $problema) {
        $sql = "INSERT INTO INCIDENCIA (CODIGO, PROBLEMA, PUESTO, ESTADO) 
            VALUES (:CODIGO, :PROBLEMA, :PUESTO, 'pendiente')";
    
        $params = [
            ':CODIGO' => static::$contador,
            ':PROBLEMA' => $problema,
            ':PUESTO' => $puesto
        ];
    
        try {
            $result = self::queryPreparadaDB($sql, $params);
            
            if ($result) {
                echo "La incidencia " . static::$contador . " creada correctamente.\n";
                static::$contador++;
                return self::obtenerPorCodigo(static::$contador - 1);
            } else {
                echo "La incidencia " . static::$contador . " no se ha podido crear.\n";
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
            return new static(
                $row['CODIGO'],
                $row['PROBLEMA'],
                $row['RESOLUCION'],
                $row['PUESTO'],
                $row['ESTADO']
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
            $incidencia = new static(
                $row['CODIGO'],
                $row['PROBLEMA'],
                $row['ESTADO'],
                $row['RESOLUCION'],
                $row['PUESTO']
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

    public static function getPendientes() {
        $sql = "SELECT COUNT(*) AS TOTAL FROM INCIDENCIA WHERE ESTADO = 'pendiente'";
        $result = self::queryPreparadaDB($sql, []);
        return $result[0]['TOTAL'] . "\n";
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
    

    public function getCodigo() {
        return $this->codigo;
    }
}
?>

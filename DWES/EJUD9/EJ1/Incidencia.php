<?php
/**
 * 
 */

include_once __DIR__ ."/traitDB.php";

class Incidencia {
    use TraitDB;
    private $codigo;
    private $descripcion;
    private $estado;
    private $fecha_creacion;
    private $fecha_cierre;
    private $solucion;

    public function __construct($codigo, $descripcion, $estado, $fecha_creacion, $fecha_cierre = null, $solucion = null) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->fecha_creacion = $fecha_creacion;
        $this->fecha_cierre = $fecha_cierre ? $fecha_cierre : null;
        $this->solucion = $solucion;
    }

    public static function resetearBD() {
        $conn = self::connectDB();
        $conn->exec("DROP TABLE IF EXISTS incidencias");
        $conn->exec("CREATE TABLE incidencias (
            codigo INT PRIMARY KEY,
            descripcion TEXT NOT NULL,
            estado ENUM('pendiente', 'resuelta') DEFAULT 'pendiente',
            fecha_creacion DATETIME NOT NULL,
            fecha_cierre DATETIME,
            solucion TEXT
        )");
    }

    public static function creaIncidencia($codigo, $descripcion) {
        $sql = "INSERT INTO incidencias (codigo, descripcion, fecha_creacion) 
                VALUES (:codigo, :descripcion, NOW())";

        $params = [
            ':codigo' => $codigo,
            ':descripcion' => $descripcion
        ];
    
        try {
            $result = self::queryPreparadaDB($sql, $params);
            
            if ($result) {
                echo "La incidencia $codigo creada correctamente.\n";

                return self::obtenerPorCodigo($codigo);
            } else {
                echo "La incidencia $codigo no se ha podido crear.\n";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al crear la consulta: " . $e->getMessage();
            return false;
        }
    }

    private static function obtenerPorCodigo($codigo) {
        $sql = "SELECT * FROM incidencias WHERE codigo = :codigo";
        $params = [':codigo' => $codigo];
        $result = self::queryPreparadaDB($sql, $params);
        
        if (!empty($result)) {
            $row = $result[0];
            return new static(
                $row['codigo'],
                $row['descripcion'],
                $row['estado'],
                $row['fecha_creacion'],
                $row['fecha_cierre'],
                $row['solucion']
            );
        }
        return null;
    }

    public function resuelve($solucion) {
        $sql = "UPDATE incidencias 
                SET estado = 'resuelta', solucion = :solucion, fecha_cierre = NOW() 
                WHERE codigo = :codigo";
        
        $params = [
            ':solucion' => $solucion,
            ':codigo' => $this->getCodigo()
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
        $sql = "SELECT * FROM incidencias";
        $result = self::queryPreparadaDB($sql, []);
        
        foreach ($result as $row) {
            $incidencia = new self(
                $row['codigo'],
                $row['descripcion'],
                $row['estado'],
                $row['fecha_creacion'],
                $row['fecha_cierre'],
                $row['solucion']
            );
            echo $incidencia;
        }
    }

    public function actualizaIncidencia($nueva_descripcion, $nueva_solucion, $nuevo_estado) {
        $sql = "UPDATE incidencias SET ";
        $params = [':codigo' => $this->getCodigo()];
        $quieresActualizar = false;

        if (!empty($nueva_descripcion)) {
            $sql .= "descripcion = :descripcion";
            $params[':descripcion'] = $nueva_descripcion;
            $quieresActualizar = true;
        }
        
        if (!empty($nueva_solucion)) {
            $sql .= "solucion = :solucion";
            $params[':solucion'] = $nueva_solucion;
            $quieresActualizar = true;
        }
        
        if (!empty($nuevo_estado) && in_array($nuevo_estado, ['pendiente', 'resuelta'])) {
            $sql .= "estado = :estado";
            $params[':estado'] = $nuevo_estado;
            $quieresActualizar = true;
        }

        if (!$quieresActualizar) {
            echo "No se ha actualizado nada.\n";
            return false;
        }

        $sql .= " WHERE codigo = :codigo";
        if (self::queryPreparadaDB($sql, $params)) {
            echo "Incidencia actualizada.\n";
            self::leeIncidencia($this->getCodigo());
            return true;
        }
        return false;
    }

    public function borraIncidencia() {
        $sql = "DELETE FROM incidencias WHERE codigo = :codigo";
        $params = [':codigo' => $this->getCodigo()];
        
        if (self::queryPreparadaDB($sql, $params)) {
            echo "La incidencia" . $this->getCodigo() . " se ha borrado correctamente.\n";
            self::leeTodasIncidencias();
        } else {
            echo "Error al borrar la incidencia " . $this->getCodigo() . ".\n";
        }
    }

    public static function getPendientes() {
        $sql = "SELECT COUNT(*) as total FROM incidencias WHERE estado = 'pendiente'";
        $result = self::queryPreparadaDB($sql, []);
        return $result[0]['total'] . "\n";
    }

    public function __toString() {
        $output = "Código: {$this->getCodigo()}\n";
        $output .= "Descripción: {$this->descripcion}\n";
        $output .= "Estado: {$this->estado}\n";
        $output .= "Fecha creación: " . $this->fecha_creacion . "\n";
        
        if ($this->estado === 'resuelta') {
            $output .= "Fecha cierre: " . $this->fecha_cierre . "\n";
            $output .= "Solución: {$this->solucion}\n";
        }
        
        return $output . "\n";
    }

    public function getCodigo() {
        return $this->codigo;
    }
}
?>

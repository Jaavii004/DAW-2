<?php
require_once __DIR__ . "/../traitDB.php";

class Incidencia {
    use traitDB;

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
        $this->fecha_creacion = new DateTime($fecha_creacion);
        $this->fecha_cierre = $fecha_cierre ? new DateTime($fecha_cierre) : null;
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
            $result = traitDB::queryPreparadaDB($sql, $params);
            
            if ($result) {
                echo "Incidencia $codigo creada correctamente.\n";
                
                // Verificación adicional
                $sqlCheck = "SELECT * FROM incidencias WHERE codigo = :codigo";
                $resultCheck = traitDB::queryPreparadaDB($sqlCheck, [':codigo' => $codigo]);
                
                if (empty($resultCheck)) {
                    echo "No se ha insertado la incidencia correctamente.\n";
                } else {
                    echo "La incidencia se insertó correctamente.\n";
                }
                
                return self::obtenerPorCodigo($codigo);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage() . "\n";
            return false;
        }
    }

    private static function obtenerPorCodigo($codigo) {
        $sql = "SELECT * FROM incidencias WHERE codigo = :codigo";
        $params = [':codigo' => $codigo];
        $result = self::queryPreparadaDB($sql, $params);
        
        if (!empty($result)) {
            $row = $result[0];
            return new self(
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
            ':codigo' => $this->codigo
        ];
        
        if (self::queryPreparadaDB($sql, $params)) {
            echo "Incidencia {$this->codigo} resuelta.\n";
            self::leeIncidencia($this->codigo);
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
        $updates = [];
        $params = [':codigo' => $this->codigo];

        if (!empty($nueva_descripcion)) {
            $updates[] = "descripcion = :descripcion";
            $params[':descripcion'] = $nueva_descripcion;
        }
        
        if (!empty($nueva_solucion)) {
            $updates[] = "solucion = :solucion";
            $params[':solucion'] = $nueva_solucion;
        }
        
        if (!empty($nuevo_estado) && in_array($nuevo_estado, ['pendiente', 'resuelta'])) {
            $updates[] = "estado = :estado";
            $params[':estado'] = $nuevo_estado;
        }

        if (empty($updates)) return false;

        $sql = "UPDATE incidencias SET " . implode(', ', $updates) . " WHERE codigo = :codigo";
        
        if (self::queryPreparadaDB($sql, $params)) {
            echo "Incidencia actualizada.\n";
            self::leeIncidencia($this->codigo);
            return true;
        }
        return false;
    }

    public function borraIncidencia() {
        $sql = "DELETE FROM incidencias WHERE codigo = :codigo";
        $params = [':codigo' => $this->codigo];
        
        if (self::queryPreparadaDB($sql, $params)) {
            echo "Incidencia eliminada.\n";
            self::leeTodasIncidencias();
            return true;
        }
        return false;
    }

    public static function getPendientes() {
        $sql = "SELECT COUNT(*) FROM incidencias WHERE estado = 'pendiente'";
        $result = self::queryPreparadaDB($sql, []);
        return $result[0]['COUNT(*)'];
    }

    public function __toString() {
        $output = "Código: {$this->codigo}\n";
        $output .= "Descripción: {$this->descripcion}\n";
        $output .= "Estado: {$this->estado}\n";
        $output .= "Fecha creación: " . $this->fecha_creacion->format('Y-m-d H:i:s') . "\n";
        
        if ($this->estado === 'resuelta') {
            $output .= "Fecha cierre: " . $this->fecha_cierre->format('Y-m-d H:i:s') . "\n";
            $output .= "Solución: {$this->solucion}\n";
        }
        
        return $output . "\n";
    }

    public function getCodigo() {
        return $this->codigo;
    }
}
?>

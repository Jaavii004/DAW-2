<?php

require_once __DIR__ . "/db.php";
trait traitDB
{
    public static function connectDB()
    {
        try {
            // Se crea la conexión usando el charset adecuado
            $conn = new PDO(
                "mysql:host=" . HOST . ";dbname=INCIDENCIAS;charset=utf8",
                MYSQL_ROOT,
                MYSQL_ROOT_PASSWORD
            );
            // Configuramos PDO para que lance excepciones en caso de error
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        //devuelve la conexion creada
        return $conn;
    }

    public function execDB($sql)
    {
        //usa la conexion, ejecuta la sentencia y devuelve el numero de filas afectadas
        $conn = $this->connectDB();
        return $conn->exec($sql);
    }

    public static function queryPreparadaDB($sql, $parametros)
    {
        //usa la conexion, prepara la sentencia, la ejecuta con los parametros y devuelve el resultado con todas las filas del conjunto
        $conn = self::connectDB();
        
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute($parametros);
            
            if (stripos($sql, 'SELECT') === 0) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
            return true;
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return false;
        }
    }

    public static function resetearBD()
    {
        $conn = self::connectDB();
        $sql = "USE INCIDENCIAS";
        $conn->exec($sql);
        $sql = "DELETE FROM INCIDENCIA";
        $conn->exec($sql);
        // $sql = "DROP TABLE INCIDENCIA IF EXISTS";
        // $conn->exec($sql);
        // $sql = "CREATE TABLE INCIDENCIA (
        //     CODIGO INTEGER,
        //     ESTADO VARCHAR (100) NOT NULL,
        //     PUESTO VARCHAR (15),
        //     PROBLEMA VARCHAR(255),
        //     RESOLUCION VARCHAR(255),
        //     CONSTRAINT PK_CODIGO PRIMARY KEY(CODIGO)
        // )";
        // $conn->exec($sql);
    }
}
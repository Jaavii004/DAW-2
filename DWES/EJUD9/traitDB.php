<?php

require_once __DIR__ . "/db.php";

trait TraitDB
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
        return $conn;
    }

    public function execDB($sql)
    {
        // Se usa la conexión para ejecutar la sentencia SQL y se devuelve el número de filas afectadas
        $conn = self::connectDB();
        return $conn->exec($sql);
    }
// Cambiar de estático a no estático
public static function queryPreparadaDB($sql, $parametros = []) {
    $conn = connectDB(); // Aquí usas $this para referirte a la conexión.
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($parametros);
        
        // Si la consulta es un SELECT, devuelve los resultados
        if (stripos($sql, "SELECT") === 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Si la consulta no es SELECT, devuelve true/false
        return true;
    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . $e->getMessage();
        return false;
    }
}


    public static function resetearBD()
    {
        $conn = self::connectDB();
        // Elimina todos los registros de la tabla INCIDENCIA
        $conn->exec("DELETE FROM INCIDENCIA");

        // Si deseas dropear y recrear la tabla, descomenta el siguiente bloque:
        /*
        $conn->exec("DROP TABLE IF EXISTS INCIDENCIA");
        $conn->exec("CREATE TABLE INCIDENCIA (
            CODIGO INT PRIMARY KEY,
            ESTADO VARCHAR(100) NOT NULL,
            PUESTO VARCHAR(15),
            PROBLEMA VARCHAR(255),
            RESOLUCION VARCHAR(255)
        )");
        */
    }
}

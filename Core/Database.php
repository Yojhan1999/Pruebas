<?php
/**
 * Database - Gestión de conexión a la base de datos
 * Usa el patrón Singleton: solo crea UNA conexión PDO
 * durante toda la ejecución y la reutiliza.
 */
class Database{
/**
     * @var PDO|null Instancia única de la conexión
     * private: solo accesible dentro de esta clase
     * static: pertenece a la clase, no a un objeto
     */
    private static $instance = null;
    /**
     * Retorna la conexión PDO existente o crea una nueva
     * static: se llama como Database::getConnection() sin instanciar
     */
    public static function getConnection(){
        // Datos de conexión
        $host     = "localhost";
        $port     = "3306";
        $dbname   = "crud";
        $username = "root";
        $password = "";

        // Solo crea la conexión si no existe una previa
        if(!self::$instance){
            try {
                // DSN: cadena de conexión MySQL
                $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

                // Crea la conexión PDO
                self::$instance = new PDO ($dsn, $username, $password);
                
                // Configura PDO para lanzar excepciones en caso de error
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $th) {
                die("Error a conectar la base de datos" . $th -> getMessage());
            }
        }
        // Retorna la conexión (nueva o existente)
        return self::$instance;
    }
}
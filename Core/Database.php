<?php
class Database{

    private static $instance = null;

    public static function getConnection(){
        $host     = "localhost";
        $port     = "3306";
        $dbname   = "crud";
        $username = "root";
        $password = "";

        if(!self::$instance){
            try {
                $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
                self::$instance = new PDO ($dsn, $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $th) {
                die("Error a conectar la base de datos" . $th -> getMessage());
            }
        }
            return self::$instance;
    }
}
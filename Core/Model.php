<?php
/**
 * Model - Clase base para todos los modelos
 * Todos los modelos extienden esta clase para
 * heredar la conexión a la base de datos.
 */
class Model {
    /**
     * @var PDO $db Conexión a la base de datos
     * protected: accesible en esta clase y en las clases hijas
     */
    protected $db;

    /**
     * Constructor - Se ejecuta al crear cualquier modelo
     * Inicializa la conexión usando el Singleton de Database
     */
    public function __construct(){
        $this-> db = Database::getConnection();
    }
}
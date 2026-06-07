<?php
class Model {
    /** @var PDO $db **/
    protected $db;

    public function __construct(){
        $this-> db = Database::getConnection();
    }
}
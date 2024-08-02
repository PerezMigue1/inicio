<?php
require_once 'config.php';

class DBConnection {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
    }

    public function getconnection() {
        return $this->conexion;
    }

    public function closeConnection() {
        $this->conexion->close();
    }
}
?>
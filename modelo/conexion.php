<?php
class Conexion extends PDO {
    private static $instancia = null;

    private $hostBD = 'localhost';
    private $nombreBD = 'SmartBeerDB';
    private $usuarioBD = 'root';
    private $passwordBD = 'mau060602';

    private function __construct() {
        parent::__construct(
            'mysql:host=' . $this->hostBD . ';dbname=' . $this->nombreBD . ';charset=utf8',
            $this->usuarioBD,
            $this->passwordBD,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    }

    public static function getInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Conexion();
        }
        return self::$instancia;
    }
}
?>

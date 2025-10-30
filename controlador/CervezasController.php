<?php
require_once('modelo/CervezasModel.php');

class CervezasController{
    private $CervezasModel;
    function __costruct(){
        $this->CervezasModel = new CervezasModel();
    }
    public static function cervezas(){
        $cerveza = self::obtenerCervezas();
        require_once('vista/opciones/cervezas.php');
    }
    public static function obtenerCervezas(){
        $cervezasModel = new CervezasModel();
        $Nacionales = $cervezasModel->ConsultaProductoCervezaNacionales();
        require_once('vista/opciones/cervezas.php');

    }




}


?>
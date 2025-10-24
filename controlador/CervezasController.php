<?php
require_once('modelo/CervezasModel.php');

class CervezasController{
    private $CervezasModel;
    function __costruct(){
        $this->CervezasModel = new CervezasModel();
    }
    public static function cervezas(){
        require_once('vista/opciones/cervezas.php');
    }





}


?>
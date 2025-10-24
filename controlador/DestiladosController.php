<?php
require_once('modelo/DestiladosModel.php');
class DestiladosController{
    private $DestiladosModel;

    function __construct(){
        $this->$DestiladosModel = new $DestiladosModel;
    }
    public static function destilados(){
        require_once('vista/opciones/destilados.php');
    }
}
?>
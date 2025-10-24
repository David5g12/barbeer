<?php
require_once('modelo/CombosModel.php');
class CombosController{

    private $CombosModel;
    function __construct(){
        $this->$CombosModel = new $CombosModel;
    }
    public static function combos(){
        require_once('vista/opciones/combos.php');
    }
}
?>
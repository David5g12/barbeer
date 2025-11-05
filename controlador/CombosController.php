<?php
require_once('modelo/CombosModel.php');
class CombosController{

    private $CombosModel;
    function __construct(){
        $this->CombosModel = new CombosModel();
    }
    public static function combos(){
        $combos = self::obtenerCombos();
        require_once('vista/opciones/combos.php');
    }
    public static function obtenerCombos(){
        $combosModel = new CombosModel();
        $combos = $combosModel->ConsultarCombos();
        require_once('vista/opciones/combos.php');

    }
}
?>
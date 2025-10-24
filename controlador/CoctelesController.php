<?php
require_once('modelo/CoctelesModel.php');
class CoctelesController{
    private $CoctelesModel;
    function __construct(){
        $this->$CoctelesModel = new $CoctelesModel;
    }
    public static function cocteles(){
        require_once('vista/opciones/cocteles.php');
    }
}
?>
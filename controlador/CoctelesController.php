<?php
require_once('modelo/CoctelesModel.php');
class CoctelesController{
    private $CoctelesModel;
    function __construct(){
        $this->CoctelesModel = new CoctelesModel();
    }
    public static function cocteles(){
        $coctel = self::obtenerCocteles();
        require_once('vista/opciones/cocteles.php');
    }
    public static function obtenerCocteles(){
        $coctelesModel = new CoctelesModel();
        $Clasicos = $coctelesModel->ConsultaProductoCoctelClasicos();
        $delacasa = $coctelesModel->ConsultaProductoCoctelDelacasa();
        $Sinalcohol = $coctelesModel->ConsultaProductoCoctelSinalcohol();
        require_once('vista/opciones/cocteles.php');

    }

}
?>
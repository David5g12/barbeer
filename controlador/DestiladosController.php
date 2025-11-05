<?php
require_once('modelo/DestiladosModel.php');
class DestiladosController{
    private $DestiladosModel;

    function __construct(){
        $this->DestiladosModel = new DestiladosModel();
    }
    public static function destilados(){
        $destilado = self::obtenerDestilados();
        require_once('vista/opciones/destilados.php');
    }
    public static function obtenerDestilados(){
        $destiladosModel = new DestiladosModel();
        $Tequila = $destiladosModel->ConsultaProductoDestiladoTequila();
        $Whisky = $destiladosModel->ConsultaProductoDestiladoWhisky();
        $Ron = $destiladosModel->ConsultaProductoDestiladoRon();
        $Vodka = $destiladosModel->ConsultaProductoDestiladoVodka();
        $Shots = $destiladosModel->ConsultaProductoDestiladoShots();

        require_once('vista/opciones/destilados.php');

    }
}
?>
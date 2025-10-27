<?php
require_once('modelo/PedidosModel.php');
class PedidosController{
    private $PedidosModel;
    function __construct(){
        $this->$PedidosModel = new $PedidosModel;
    }
    public static function pedidos(){
        require_once('vista/opciones/pedidos.php');
    }
    
    public static function barra(){
        require_once('vista/opciones/barra.php');
    }
}
?>
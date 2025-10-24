<?php
require_once('modelo/pedidoModel.php');

class pedidoController{
    private $pedidoModel;
    function __construct(){
        $this->pedidoModel = new pedidoModel();
    }
    public static function pedido(){
        require_once('vista/opciones/pedidos.php');
    }

}
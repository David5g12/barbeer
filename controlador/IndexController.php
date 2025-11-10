<?php
require_once('modelo/IndexModel.php');
class IndexController{
    private $IndexModel;
    function __construct(){
        $this->IndexModel = new IndexModel();
    }

    public static function index(){
        $productos = new IndexModel();
        $datosProducto =$productos->ConsultaProducto();
        require_once('vista/index.php');
    }
}

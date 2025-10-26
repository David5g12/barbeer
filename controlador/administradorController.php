<?php
require_once('modelo/administradorModel.php');

class administradorController{
    private $adminModel;
    function __costruct(){
        $this->adminModel = new administradorModel();
    }
    public static function facturas(){
        require_once('vista/administrador/facturas.php');
    }
    
    public static function reportes(){
        require_once('vista/administrador/reportes.php');
    }

    public static function ventas(){
        require_once('vista/administrador/ventas.php');
    }
    
    public static function compras_pro(){
        require_once('vista/administrador/compras_pro.php');
    }


}


?>
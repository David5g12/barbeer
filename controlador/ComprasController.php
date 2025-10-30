<?php
require_once('modelo/ComprasModel.php');
class ComprasController{
    private $ComprasModel;

    function __construct(){
        $this->ComprasModel = new ComprasModel();
    }

    public static function compras(){
        require_once('vista/administrador/compras.php');
    }
    
    public static function productos(){
        require_once('vista/tablas/productos.php');
    }
    
    public static function AgregarProducto(){
        require_once('vista/form/AgregarProducto.php');
    }
    
    public static function EditarProducto(){
        require_once('vista/form/EditarProducto.php');
    }
}
?>

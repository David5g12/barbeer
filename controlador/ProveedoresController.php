<?php
require_once('modelo/ProveedoresModel.php');

class ProveedoresController{
    private $ProveedoresModel;

    function __construct(){
        $this->ProveedoresModel = new ProveedoresModel();
    }
    public static function proveedores(){
        $proveedor = new ProveedoresModel();
        $total_proveedores = $proveedor->TotalProveedores();
        $datos_proveedores = $proveedor->DatosProveedores();
        require_once('vista/administrador/proveedores.php');
    }
    
    public static function AgregarProveedores(){
        require_once('vista/form/AgregarProveedores.php');
    }
    
    public static function EditarProveedores(){
        require_once('vista/form/EditarProveedores.php');
    }


}

?>
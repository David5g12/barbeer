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

    public static function ResgistrarProveedores(){
        $n_empresa = $_POST['n_empresa'];
        $c_nombre = $_POST['c_nombre'];
        $c_email = $_POST['c_email'];
        $c_telefono = $_POST['c_telefono'];
        $direccion = $_POST['direccion'];
        $c_suministradas = $_POST['c_suministradas'];
        $insertarPov = new ProveedoresModel();
        $insertarPov->RegistrarProveedor($n_empresa,$c_nombre,$c_email,$c_telefono,$direccion,$c_suministradas);
        header("location:".urlsite."index.php?c=proveedores&p=proveedores");
        
    }
    
    public static function EditarProveedores(){
        $id_proveedor =$_GET['id'];
        $editar = new ProveedoresModel();
        $EditarProveedor = $editar->EditarProveedor($id_proveedor);
        require_once('vista/form/EditarProveedores.php');
    }
    public static function ActualizarProveedor(){
        $id = $_POST['id'];
        $n_empresa = $_POST['n_empresa'];
        $c_nombre = $_POST['c_nombre'];
        $c_email = $_POST['c_email'];
        $c_telefono = $_POST['c_telefono'];
        $direccion = $_POST['direccion'];
        $c_suministradas = $_POST['c_suministradas'];
        $ActualizarPov = new ProveedoresModel();
        $ActualizarPov->ActualizarProveedores($id,$n_empresa,$c_nombre,$c_email,$c_telefono,$direccion,$c_suministradas);
        header("location:".urlsite."index.php?c=proveedores&p=proveedores");
        
    }

    public static function EliminarProveedor(){
        $id = $_GET['id'];
        $eliminar = new ProveedoresModel();
        $eliminar->EliminarProveedor($id);
        header("location:".urlsite."index.php?c=proveedores&p=proveedores");
    }


}

?>
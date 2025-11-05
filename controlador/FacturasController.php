<?php
require_once('modelo/FacturasModel.php');
class FacturasController{
    private $FacturasModel;

    function __construct(){
        $this->FacturasModel = new FacturasModel();
    }
    public static function facturas(){
        $facturamodel = new FacturasModel();
        $facturas = $facturamodel->facturasGeneral();
        $obtenerFacturas = $facturamodel->consultarFacturas();
        require_once('vista/administrador/facturas.php');
    }
    
    public static function ticket(){
        require_once('vista/tablas/ticket.php');
    }
        
    public static function factura(){
        require_once('vista/tablas/factura.php');
    }
}
?>
<?php
require_once('modelo/DashboardModel.php');
class DashboardController{

    private $DashboardModel;

    function __construct(){
        $this->DashboardModel = new DashboardModel();
    }
    public static function dashboard(){
        $obtenerDatos = self::obtenerDatosDashboard();
        $actividadesRecientes = (new DashboardModel())->actividadesRecientes();
        $productosMasVendidos = (new DashboardModel())->productosMasVendidos();
        require_once('vista/dashboard.php');
    }
    public static function obtenerDatosDashboard(){
        $model = new DashboardModel();
        return $model->getDatosDashboard();
    }

}
?>
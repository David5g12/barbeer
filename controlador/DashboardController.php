<?php
require_once('modelo/DashboardModel.php');
class DashboardController{

    private $DashboardModel;

    function __construct(){
        $this->$DashboardModel = new $DashboardModel;
    }
    public static function dashboard(){
        require_once('vista/dashboard.php');
    }

}
?>
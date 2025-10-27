<?php
require_once('modelo/ReportesModel.php');
class ReportesController{
    private $ReportesModel;

    function __construct(){
        $this->$ReportesModel = new $ReportesModel;
    }
    public static function reportes(){
        require_once('vista/administrador/reportes.php');
    }
}
?>
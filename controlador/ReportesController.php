<?php
require_once('modelo/ReportesModel.php');
class ReportesController{
    private $ReportesModel;

    function __construct(){
        $this->ReportesModel = new  ReportesModel();
    }
    public static function reportes(){
        $ReportesModel = new ReportesModel();
        $reporte_mensual = $ReportesModel->ReporteGeneral();
        // $tendencias_mensuales = $ReportesModel->ReporteMensual();
        // $reporte_semanal = $ReportesModel->ReporteSemanal();
        // $reporte_categorias = $ReportesModel->ReportePorCategoria();
        require_once('vista/administrador/reportes.php');
    }
}
?>
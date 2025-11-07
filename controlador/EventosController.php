<?php
require_once('modelo/EventosModel.php');
class EventosController{
    private $EventosModel;

    function __construct(){
        $this->EventosModel = new EventosModel();
    }
    
    public static function eventos(){
        $eventosModel = new EventosModel(); 
        $eventos = $eventosModel->obtenerEventos();
        require_once('vista/opciones/eventos.php');
    }
    
}


?>
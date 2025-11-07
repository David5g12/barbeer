<?php
class EventosModel{
    public function obtenerEventos(){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM EVENTOS;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $eventos;
    }
}
?>
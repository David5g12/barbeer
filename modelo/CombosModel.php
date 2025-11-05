<?php
class CombosModel{

    public function ConsultarCombos(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM COMBOS;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $combos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $combos;
    }
    
}
?>
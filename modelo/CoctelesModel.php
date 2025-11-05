<?php
class CoctelesModel{

    public function ConsultaProductoCoctelClasicos(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Cocteles' and tipo = 'Clásicos';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoCoctelDelacasa(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Cocteles' and tipo = 'De la casa';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoCoctelSinalcohol(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Cocteles' and tipo = 'Sin alcohol';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    
}
?>
<?php
class CervezasModel{

    public function ConsultaProductoCervezaNacionales(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Cervezas' and tipo = 'Nacionales';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoCervezaArtesanal(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Cervezas' and tipo = 'Artesanal';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoCervezaImportadas(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Cervezas' and tipo = 'Importadas';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoCervezaBarril(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Cervezas' and tipo = 'De barril';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    
}

?>
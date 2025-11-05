<?php
class DestiladosModel{
    public function ConsultaProductoDestiladoTequila(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Destilados' and tipo = 'Tequila';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoDestiladoWhisky(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Destilados' and tipo = 'Whisky';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoDestiladoRon(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Destilados' and tipo = 'Ron';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoDestiladoVodka(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Destilados' and tipo = 'Vodka';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    public function ConsultaProductoDestiladoShots(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM PRODUCTOS WHERE categoria = 'Destilados' and tipo = 'Shots';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }
    
}
?>
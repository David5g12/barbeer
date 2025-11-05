<?php
class ProveedoresModel{
    public function TotalProveedores(){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
           SELECT COUNT(*) AS total_proveedores
            FROM proveedores;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $proveedores;
    }
    public function DatosProveedores(){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
           select * from proveedores;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $proveedores;
    }


}
?>
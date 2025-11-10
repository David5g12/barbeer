<?php
class IndexModel{

    public function ConsultaProducto(){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $consulta ="SELECT * FROM productos ORDER BY RAND() LIMIT 20";
        $consultaProd =$conexion->prepare($consulta);
        $consultaProd->execute();
        $producto = $consultaProd->FETCHALL(PDO::FETCH_ASSOC);
        return $producto;
       


    }

}
?>

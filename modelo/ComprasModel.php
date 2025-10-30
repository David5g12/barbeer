<?php
class ComprasModel{
    private $producto;

    public function __construct(){
        $this->producto = array();
    }

    public function ConsultaProducto(){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $consulta = "SELECT * FROM PRODUCTOS";

        $resultado=$conexion->prepare($consulta);
        $resultado->execute();

        $this->producto = $resultado->fetchall(PDO::FETCH_ASSOC);
        return $this->producto;
    }

    public function InsertarProducto($nombre,$categoria,$tipo,$descripcion,$precio_compra,$precio_venta,$stock,$alc_vol,$img){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $insert = "INSERT INTO PRODUCTOS(nombre,categoria,tipo,descripcion,precio_compra,precio_venta,stock_unidades,alc_vol,img)
        VALUES(:nombre,:categoria,:tipo,:descripcion,:precio_compra,:precio_venta,:stock,:alc_vol,:img)
        ";
        $insertar = $conexion->prepare($insert);

        $insertar->execute([
            ':nombre' => $nombre,
            ':categoria' => $categoria,
            ':tipo' =>$tipo,
            ':descripcion' =>$descripcion,
            ':precio_compra' =>$precio_compra,
            ':precio_venta' =>$precio_venta,
            ':stock' =>$stock,
            'alc_vol' => $alc_vol,
            'img' =>$img

        ]);
        if($insertar){
            return true;
        }
        else{
            return false;
        }
    }
    public function EditarProducto($id_producto){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $editar = "SELECT * FROM PRODUCTOS WHERE producto_id = :id";
        $EditarProducto = $conexion->prepare($editar);

        $EditarProducto->bindParam(':id',$id_producto, PDO::PARAM_INT);
        $EditarProducto->execute();

        $this->producto = $EditarProducto->fetchall(PDO::FETCH_ASSOC);
        return $this->producto;
    }

    public function ActualizarProducto($id,$nombre,$categoria,$tipo,$descripcion,$precio_compra,$precio_venta,$stock,$alc_vol,$img){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $actualizar = "UPDATE PRODUCTOS SET nombre=:nombre,categoria=:categoria,tipo=:tipo,
        descripcion=:descripcion,precio_compra=:precio_compra,precio_venta=:precio_venta,
        stock_unidades=:stock,alc_vol=:alc_vol,img=:img WHERE producto_id =:id";

        $actualizarP = $conexion->prepare($actualizar);
        $actualizarP->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':categoria' => $categoria,
            ':tipo' => $tipo,
            ':descripcion' => $descripcion,
            ':precio_compra' => $precio_compra,
            ':precio_venta' => $precio_venta,
            ':stock' => $stock,
            ':alc_vol' => $alc_vol,
            ':img' => $img
        ]);

        if($actualizarP){
            return true;
        }
        else{
            return false;

        }
    }

    public function EliminarProducto($id){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $delete = "DELETE FROM PRODUCTOS WHERE producto_id =:id";
        $eliminar = $conexion->prepare($delete);
        $eliminar->bindParam(':id',$id, PDO::PARAM_INT);
        $eliminar->execute();
        if($eliminar){
            return true;
        }
        else{
            return false;
        }

    }

    
}
?>
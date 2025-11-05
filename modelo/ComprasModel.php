<?php
class ComprasModel{
    private $producto;

    public function __construct(){
        $this->producto = array();
    }
    public function TotalComprasMes(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
        SELECT 
        DATE_FORMAT(fecha_orden, '%Y-%m') AS mes,
        SUM(total_compra) AS total_mensual
        FROM compras
        GROUP BY DATE_FORMAT(fecha_orden, '%Y-%m')
        ORDER BY mes DESC;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $Total_mes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $Total_mes;
    }
    public function ComprasPendientes(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT COUNT(*) AS compras_pendientes
            FROM compras
            WHERE estado = 'Pendiente';

        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $pendientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $pendientes;
    }
    public function ComprasRecibidas(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT COUNT(*) AS compras_recibidas
            FROM compras
            WHERE estado = 'Recibida';
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $recibidas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $recibidas;
    }   

    public function historialCompras(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT 
            c.compra_id,
            p.nombre AS proveedor,
            c.fecha_orden,
            c.fecha_recepcion,
            c.estado,
            c.total_compra
            FROM compras c
            INNER JOIN proveedores p ON c.proveedor_id = p.proveedor_id
            ORDER BY c.fecha_orden DESC;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $historial = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $historial;
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
        $insert = "INSERT INTO PRODUCTOS(nombre_producto,categoria,tipo,descripcion,precio_compra,precio_venta,stock_unidades,alc_vol,img)
        VALUES(:nombre,:categoria,:tipo,:descripcion,:precio_compra,:precio_venta,:stock,:alc_vol,:img)
        ";
        $insertar = $conexion->prepare($insert);

        $insertar->execute([
            ':nombre_producto' => $nombre,
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
        $actualizar = "UPDATE PRODUCTOS SET nombre_producto=:nombre_producto,categoria=:categoria,tipo=:tipo,
        descripcion=:descripcion,precio_compra=:precio_compra,precio_venta=:precio_venta,
        stock_unidades=:stock,alc_vol=:alc_vol,img=:img WHERE producto_id =:id";

        $actualizarP = $conexion->prepare($actualizar);
        $actualizarP->execute([
            ':id' => $id,
            ':nombre_producto' => $nombre,
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
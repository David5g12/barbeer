<?php
class PedidosModel{


    public function obtenerMesasLibres() {
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->query("SELECT * FROM MESAS WHERE estado='Libre'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerNombreEmpleado($id_empleado){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("SELECT nombre FROM empleado WHERE id_empleado=?");
        $stmt->execute([$id_empleado]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function obtenerProductos() {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->query("SELECT * FROM PRODUCTOS");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerProductoPorId($producto_id) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("SELECT * FROM PRODUCTOS WHERE producto_id=?");
        $stmt->execute([$producto_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerComboPorId($combo_id) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("SELECT * FROM COMBOS WHERE combo_id=?");
        $stmt->execute([$combo_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function obtenerCombos() {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->query("SELECT * FROM COMBOS");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function crearPedido($mesa_id, $id_empleado) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();

        $stmt = $conexion->prepare("INSERT INTO PEDIDOS (mesa_id, id_empleado) VALUES (?, ?)");
        $stmt->execute([$mesa_id, $id_empleado]);

        $pedido_id = $conexion->lastInsertId(); //  ahora funciona bien

        // Marcar la mesa como ocupada
        $stmt2 = $conexion->prepare("UPDATE MESAS SET estado='Ocupada' WHERE mesa_id=?");
        $stmt2->execute([$mesa_id]);

        return $pedido_id;
    }
    public function cancelarPedido($pedido_id, $estado_pedido,$mesa_id,$estado_mesa){
        include_once('conexion.php');
        $cnn = Conexion::getInstancia();
        $sql = "UPDATE PEDIDOS 
            SET estado = ? 
            WHERE pedido_id = ?";
        $stmt = $cnn->prepare($sql);
        $stmt->execute([$estado_pedido,$pedido_id]);
       
        $this->actualizaEstadoMesa($mesa_id,$estado_mesa);

    }


    public function agregarDetalle($pedido_id, $producto_id = null, $combo_id = null, $cantidad, $precio, $es_combo) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("
            INSERT INTO DETALLE_PEDIDOS 
            (pedido_id, producto_id, combo_id, cantidad, precio_unitario_al_momento, es_combo)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$pedido_id, $producto_id, $combo_id, $cantidad, $precio, $es_combo]);
        $this->actualizarTotal($pedido_id);
        if (!$es_combo) {
            $this->restarStockProducto($producto_id, $cantidad);
        }else{
            $this->restarStockCombos($combo_id,$cantidad);
        }
    }

    public function actualizarTotal($pedido_id) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("SELECT SUM(cantidad*precio_unitario_al_momento) AS total FROM DETALLE_PEDIDOS WHERE pedido_id=?");
        $stmt->execute([$pedido_id]);
        $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        $stmt2 = $conexion->prepare("UPDATE PEDIDOS SET total_venta=? WHERE pedido_id=?");
        $stmt2->execute([$total, $pedido_id]);
    }

    public function cerrarPedido($pedido_id, $metodo_pago) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("UPDATE PEDIDOS SET estado='Cerrado', metodo_pago=? WHERE pedido_id=?");
        $stmt->execute([$metodo_pago, $pedido_id]);

        // Liberar mesa automáticamente
        $stmt2 = $conexion->prepare("UPDATE MESAS SET estado='Libre' WHERE mesa_id=(SELECT mesa_id FROM PEDIDOS WHERE pedido_id=?)");
        $stmt2->execute([$pedido_id]);
    }

    public function obtenerDetalle($pedido_id) {
            include_once('conexion.php');
            $conexion = Conexion::getInstancia();

            $stmt = $conexion->prepare("
                SELECT 
                    dp.detalle_pedido_id,
                    dp.pedido_id,
                    dp.producto_id,
                    dp.combo_id,
                    dp.cantidad,
                    dp.precio_unitario_al_momento,
                    p.nombre_producto AS nombre_producto,
                    c.nombre_combo AS nombre_combo
                FROM DETALLE_PEDIDOS dp
                LEFT JOIN PRODUCTOS p ON dp.producto_id = p.producto_id
                LEFT JOIN COMBOS c ON dp.combo_id = c.combo_id
                WHERE dp.pedido_id = ?
            ");

            $stmt->execute([$pedido_id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    public function eliminarDetalle($detalle_id, $cantidad, $producto_id,$combo_id) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("DELETE FROM DETALLE_PEDIDOS WHERE detalle_pedido_id=?");
        $stmt->execute([$detalle_id]);
        if($producto_id){
            $this->sumarStockProductos($producto_id, $cantidad);
        }else{
            $this->sumarStockCombos($combo_id, $cantidad);
        }

    }
    public function obtenerNombreProducto($pedido_id) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("SELECT p.nombre_producto
        FROM DETALLE_PEDIDOS dp
        JOIN PRODUCTOS p ON dp.producto_id = p.producto_id
        WHERE dp.pedido_id = ?");
        $stmt->execute([$pedido_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);          
    
    }
    public function obtenerNombreCombo($pedido_id) {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->prepare("SELECT c.nombre_combo
        FROM DETALLE_PEDIDOS dp
        JOIN COMBOS c ON dp.combo_id = c.combo_id
        WHERE dp.pedido_id = ?");
        $stmt->execute([$pedido_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function restarStockProducto($producto_id, $cantidad) {
        include_once('conexion.php');
        $cnn = Conexion::getInstancia();
         $sql = "UPDATE PRODUCTOS 
            SET stock_unidades = stock_unidades - ? 
            WHERE producto_id = ?";
        $stmt = $cnn->prepare($sql);
        $stmt->execute([$cantidad, $producto_id]);

    }
    public function sumarStockProductos($producto_id, $cantidad) {
        include_once('conexion.php');
        $cnn = Conexion::getInstancia();
        $sql = "UPDATE PRODUCTOS 
            SET stock_unidades = stock_unidades + ? 
            WHERE producto_id = ?";
        $stmt = $cnn->prepare($sql);
        $stmt->execute([$cantidad, $producto_id]);

    }
    public function restarStockCombos($combo_id, $cantidad) {
        include_once('conexion.php');
        $cnn = Conexion::getInstancia();
         $sql = "UPDATE  COMBOS 
            SET stock_combos = stock_combos - ? 
            WHERE combo_id = ?";
        $stmt = $cnn->prepare($sql);
        $stmt->execute([$cantidad, $combo_id]);

    }
    public function sumarStockCombos($combo_id, $cantidad) {
        include_once('conexion.php');
        $cnn = Conexion::getInstancia();
        $sql = "UPDATE COMBOS 
            SET stock_combos = stock_combos + ? 
            WHERE combo_id = ?";
        $stmt = $cnn->prepare($sql);
        $stmt->execute([$cantidad, $combo_id]);

    }
    public function actualizaEstadoMesa($mesa_id, $estado){
        include_once('conexion.php');
        $cnn = Conexion::getInstancia();
        $sql = "UPDATE  MESAS 
            SET estado = ? 
            WHERE mesa_id = ?";
        $stmt = $cnn->prepare($sql);
        $stmt->execute([$estado,$mesa_id]);
    }
    


}
?>
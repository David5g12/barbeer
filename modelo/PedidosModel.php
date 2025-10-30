<?php
class PedidosModel{


    public function obtenerMesasLibres() {
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $stmt = $conexion->query("SELECT * FROM MESAS WHERE estado='Libre'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
}
?>
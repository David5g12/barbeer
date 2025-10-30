<?php
class DashboardModel{

    public function getDatosDashboard(){
        include_once('conexion.php');
        $cnn = Conexion::getInstancia();

        $consulta = "
            SELECT
                (SELECT IFNULL(SUM(total_venta),0) 
                FROM PEDIDOS 
                WHERE DATE(fecha_hora) = CURDATE() AND estado = 'Cerrado') AS ventas_hoy,
                
                (SELECT IFNULL(SUM(stock_unidades),0) 
                FROM PRODUCTOS) AS productos_en_stock,
                
                (SELECT COUNT(*) 
                FROM PEDIDOS 
                WHERE estado = 'Abierto') AS ordenes_pendientes;
        ";

        $resultado = $cnn->prepare($consulta);
        $resultado->execute();

        $datos = $resultado->fetch(PDO::FETCH_ASSOC);
        return [
            'ventasHoy' => $datos['ventas_hoy'],
            'productosEnStock' => $datos['productos_en_stock'],
            'ordenesPendientes' => $datos['ordenes_pendientes']
        ];
    }
    public function actividadesRecientes(){
        include_once('conexion.php');
        $cnn = Conexion::getInstancia();
        $consulta = "
                SELECT * FROM (
                    SELECT 'Pedido Creado' AS tipo_actividad, 
                        p.pedido_id AS referencia_id, 
                        CONCAT('Mesa: ', m.nombre, ', Total: $', p.total_venta) AS descripcion,
                        p.fecha_hora AS fecha
                    FROM PEDIDOS p
                    JOIN MESAS m ON p.mesa_id = m.mesa_id

                    UNION ALL

                    SELECT 'Factura Emitida' AS tipo_actividad,
                        f.factura_id AS referencia_id,
                        CONCAT('Pedido ID: ', f.pedido_id, ', Monto: $', f.monto) AS descripcion,
                        f.fecha_emision AS fecha
                    FROM FACTURAS f
                ) AS actividades
                ORDER BY fecha DESC
                LIMIT 10
            ";



        $resultado = $cnn->prepare($consulta);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);

    }
     public function productosMasVendidos() {
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT 
                p.nombre_producto AS producto,
                SUM(dp.cantidad) AS total_vendido,
                SUM(dp.cantidad * dp.precio_unitario_al_momento) AS total_ingresos
            FROM 
                DETALLE_PEDIDOS dp
            JOIN 
                PRODUCTOS p ON dp.producto_id = p.producto_id
            JOIN 
                PEDIDOS pe ON dp.pedido_id = pe.pedido_id
            WHERE 
                pe.estado = 'Cerrado'
            GROUP BY 
                p.producto_id, p.nombre_producto
            ORDER BY 
                total_vendido DESC
            LIMIT 10;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productos;
    }


}

?>
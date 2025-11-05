<?php
class ReportesModel{
    
    public function ReporteGeneral(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
        SELECT 
        DATE_FORMAT(p.fecha_hora, '%Y-%m') AS mes,
        SUM(p.total_venta) AS ventas_totales,
        SUM(CASE WHEN p.metodo_pago = 'Transferencia' THEN p.total_venta ELSE 0 END) AS monto_transferencias,
        COUNT(CASE WHEN p.metodo_pago = 'Transferencia' THEN 1 END) AS transacciones_transferencias,
        SUM(dp.cantidad) AS total_productos_vendidos
        FROM pedidos p
        JOIN detalle_pedidos dp ON p.pedido_id = dp.pedido_id
        WHERE p.estado = 'Cerrado'
        GROUP BY DATE_FORMAT(p.fecha_hora, '%Y-%m')
        ORDER BY mes DESC; 

        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $Reporte = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $Reporte;
    }
    
     
    
}
?>
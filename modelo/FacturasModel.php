<?php
class FacturasModel{
    public function facturasGeneral(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT 
        COUNT(*) AS total_facturas,
        SUM(CASE WHEN estado = 'Pagada' THEN 1 ELSE 0 END) AS facturas_pagadas,
        SUM(CASE WHEN estado = 'Pendiente' THEN 1 ELSE 0 END) AS facturas_pendientes,
        SUM(CASE WHEN estado = 'Por cobrar' THEN 1 ELSE 0 END) AS facturas_por_cobrar,
        SUM(monto) AS total_monto
        FROM facturas
        WHERE MONTH(fecha_emision) = MONTH(CURDATE())
        AND YEAR(fecha_emision) = YEAR(CURDATE());
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $facturas;
    }
    public function consultarFacturas(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            select * from facturas;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $facturas;
    }



    
}
?>
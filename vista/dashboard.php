<link rel="stylesheet" href="vista/css/dashboard.css">
<?php
$obtenerDatos = isset($obtenerDatos) ? $obtenerDatos : null;
?>  
<?php

   foreach ($actividadesRecientes as $actividad) {
       $tipo_actividad = $actividad['tipo_actividad'];
       $descripcion = $actividad['descripcion'];
       $fecha = $actividad['fecha'];
   }    

   

?>  
<?php

   foreach ($productosMasVendidos as $producto) {
       $nombre_producto = $producto['producto'];
       $total_vendido = $producto['total_vendido'];
       $total_ingresos = $producto['total_ingresos'];
   } ?>
<section>
    <div class="header">
        <?php
            require_once('layout/header.php')
        ?>
    </div>
    <div class="contenido">
        <div class ="encabezado">
            <h2>Bienvenido, Admin</h2>
            <p>Resumen de tu negocio en tiempo real</p>
        </div>
        <div class="reporte">

            <div class="container my-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Ventas Hoy</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-currency-dollar"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0"><?php 
                                        if ($obtenerDatos) {
                                            echo "$".$obtenerDatos['ventasHoy'];
                                        } else {
                                            echo "0";
                                        }
                                        
                                        ?> </h5>
                                    <p class="card-text mb-0">Tequila, triple sec, limón y sal</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Productos en stock</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-box-seam"></i></h5>
                                </div>
                                <div class="mb-0">
                                    <h5 class="card-text mb-0"><?php 
                                        if ($obtenerDatos) {
                                            echo $obtenerDatos['productosEnStock'];
                                        } else {
                                            echo "0";
                                        }
                                        
                                        ?> </h5>
                                    <p class="p card-text mb-0">Tequila, triple sec, limón y sal</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Ordenes pendientes</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-cart2"></i></h5>
                                </div>
                                <div class="mb-0">
                                    <h5 class="card-text mb-0"><?php 
                                        if ($obtenerDatos) {
                                            echo $obtenerDatos['ordenesPendientes'];
                                        } else {
                                            echo "0";
                                        }
                                        
                                        ?> </h5>
                                    <p class="p card-text mb-0">Tequila, triple sec, limón y sal</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                   

                    

                    
                </div>
            </div>

        </div>


        
             
<div id="actividades" class="container my-0">
            <button id="toggleProductos" class="btn btn-desplegar mb-2">Actividades recientes</button>
            <div id="productosMasVendidos" class="col-12 col-md-5 custom-col prod_vendido">
                <h5>Actividades recientes</h5>

                <?php if ($actividadesRecientes && count($actividadesRecientes) > 0): ?>
                    <?php foreach ($actividadesRecientes as $actividad): ?>
                        <div class="container mb-2">
                            <div class="row">
                                <div class="card w-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-0">
                                            <h5 class="card-title">
                                                <?= htmlspecialchars($actividad['tipo_actividad']) ?> 
                                                #<?= htmlspecialchars($actividad['referencia_id']) ?>
                                            </h5>
                                            <h5 class="mb-0 precio">
                                                <i class="bi bi-currency-dollar"><?= htmlspecialchars($actividad['descripcion']) ?></i>
                                            </h5>
                                        </div>
                                        <p><?= htmlspecialchars($actividad['fecha']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay actividades recientes</p>
                <?php endif; ?>
            </div>           
                <div class="col-12 col-md-5 custom-col prod_vendido">
                    <h6>Productos más vendidos</h6>
                    <?php if ($productosMasVendidos && count($productosMasVendidos) > 0): ?>
                    <?php foreach ($productosMasVendidos as $producto): ?>
                    <div id="producto" class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <h5 class="card-title">
                                             <?= htmlspecialchars($producto['producto']) ?>         
                                    </h5>
                                        <h5 class="mb-0 precio"><i class="bi bi-currency-dollar">
                                            
                                                                        <?= htmlspecialchars($producto['total_ingresos']) ?>   

                                        </i>
                                    </h5>
                                    </div>
                                    <p>
                                        Vendidos: 
                                        <?= htmlspecialchars($producto['total_vendido']) ?>   
                                    </p>
                                </div>
                                 <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay ventas</p>
                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
         </div>
                
        
            
                


    </div>


    <script>
        document.getElementById('toggleProductos').addEventListener('click', function() {
            const div = document.getElementById('productosMasVendidos');
            div.style.display = (div.style.display === 'none') ? 'block' : 'none';
        });
    </script>

</section>
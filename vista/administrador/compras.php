<link rel="stylesheet" href="vista/css/compras.css">


<section>
    <div class="header">
        <?php
            require_once('vista/layout/header.php');
        ?>

    </div>
    <div class ="contenido">
        <div class ="encabezado">
            <div class="texto">
                <h2>Reporte compras</h2>
                <p>Gestiona ordenes de compra a proveedores</p>
            
            </div>
            <div class="boton">
                <a href="index.php?c=compras&p=productos" class="btn btn"><i class="bi bi-box-seam"></i> Gestionar producto</a>
                <a href="index.php?c=proveedores&p=proveedores" class="btn btn"><i class="bi bi-plus"></i>Realizar compras</a>

            </div>
        </div>

        <div class ="reporte">
            <div class="container my-4">
                <div class="row">
                    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Total compras</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-cart"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                         <?php 
                                        if ($total_mes_compras) {
                                            echo "$".$total_mes_compras[0]['total_mensual'];
                                        } else {
                                            echo "0";
                                        }
                                        
                                        ?>
                                    </h5>
                                    <p class="card-text mb-0">
                                        fecha
                                        <?php
                                        if ($total_mes_compras) {
                                            echo $total_mes_compras[0]['mes'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Pendientes</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-cart"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                        <?php 
                                        if ($pendientes) {
                                            echo $pendientes[0]['compras_pendientes'];
                                        } else {
                                            echo "0";
                                        }
                                        
                                        ?>
                                    </h5>
                                    <p class="card-text mb-0">Ordenes por recibir</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Recibidas</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-cart"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                        <?php 
                                        if ($recibidas) {
                                            echo $recibidas[0]['compras_recibidas'];
                                        } else {
                                            echo "0";
                                        }
                                        
                                        ?>
                                    </h5>
                                    <p class="card-text mb-0">Completadas</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <div class="historial">
            <h5 class="h"> Historial de compras</h5>
            <div id="producto" class="container my-2">
                <div class="row">
                    <?php if ($historial_compras && count($historial_compras) > 0): ?>
                        <?php foreach ($historial_compras as $compra): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-12 mb-2">
                        <div class="card h-100" >
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flax-nowrap mb-0">
                                    <div class="d-flex align-items-center gap-2 flex-nowrap">
                                        <h5 class="card-title">P-001</h5>
                                        <h5 class="btn btn-warning py-1 px-2 mb-0"> 
                                            <?php 
                                                echo $compra['estado'];
                                            ?>
                                        </h5>
                                        <p class="text-fecha mb-1">Ordenada el:
                                            <?php 
                                                echo $compra['fecha_orden'];
                                            ?>
                                        </p>
                                    </div>
                                    <h5 class="mb-0 precio"><i class="bi bi-currency-dollar">
                                        <?php 
                                            echo $compra['total_compra'];
                                        ?>
                                    </i></h5>
                                </div>
                                <div class="d-flex align-items-center gap-2 flex-nowrap">
                                    <h5>
                                        <?php 
                                            echo $compra['proveedor'];
                                        ?>
                                    </h5>
                                    <i class="bi bi-dot"></i>
                                    <p class="mb-1">
                                        Recibida el:
                                        <?php 
                                            echo $compra['fecha_recepcion'];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                       <?php endforeach; ?>
                    <?php else: ?>
                        <p>No se encontraron compras.</p>
                    <?php endif; ?>
                    
                    
                </div>
            </div>


        </div>




    </div>




</section>
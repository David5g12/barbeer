<link rel="stylesheet" href="vista/css/facturas.css">
<?php
foreach($facturas as $reporte){
    $total_facturas = $reporte['total_facturas'];
    $facturas_pagadas = $reporte['facturas_pagadas'];
    $facturas_pendientes = $reporte['facturas_pendientes'];
    $facturas_por_cobrar = $reporte['facturas_por_cobrar'];
    $total_monto = $reporte['total_monto'];
 }
 

?>
<section>
    <div class="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
    <div class="contenido">
        <div class ="encabezado">
            <div class="texto">
                <h2>Facturas</h2>
                <p>Gestiona y envía facturas automática ¿</p>
            
            </div>
            <div class="boton">
                <a href="index.php?c=facturas&p=factura" class="btn btn"><i class="bi bi-receipt"></i> Facturar</a>

            </div>
        </div>

        <div class="reporte">
            <div class="container my-4">
                <div class="row">

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Total facturado</h5>
                                    <h5 class="mb-0 icono"><i class="bi bi-currency-dollar"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                        <?php echo number_format($total_monto,2,'.',','); ?>
                                    </h5>
                                    <p class="card-text mb-0">Este mes </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Facturas Pagadas</h5>
                                    <h5 class="mb-0 icono"><i class="bi bi-file-text"></i> </h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                        <?php echo number_format($facturas_pagadas,0,'.',','); ?>
                                    </h5>
                                    <p class="card-text mb-0">Completadas</p>
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
                                    <h5 class="mb-0 icono"><i class="bi bi-clock"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">
                                        <?php echo number_format($facturas_por_cobrar,0,'.',','); ?>
                                    </h5>
                                    <p class="card-text mb-0">Por cobrar</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div>

        </div>

        <div class="buscador">
            <div class="input-group search" style="width: 100%; border: 1px solid rgb(23, 22, 22)" >
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input id="busqueda" type="text" class="form-control input" placeholder="Buscar por nombre, categoria o contacto">
            </div>
    
        </div>



        <div class="historial">
            <h5 class="h"> Historial de facturas</h5>
            <div id="producto" class="container my-2">
                <div class="row">
                     <?php if ($obtenerFacturas && count($obtenerFacturas) > 0): ?>
                        <?php foreach ($obtenerFacturas as $fact): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-12 mb-2">
                        <div class="card h-100" >
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flax-nowrap mb-0">
                                    <div class="d-flex align-items-center gap-2 flex-nowrap">
                                        <h5 class="card-title">No. Factura
                                            <?php 
                                                echo $fact['factura_id'];
                                            ?>
                                        </h5>
                                        <h5 class="btn btn-warning py-1 px-2 mb-0">
                                            <?php 
                                                echo $fact['estado'];
                                            ?>
                                        </h5>
                                        <p class="text-fecha mb-1">Emitida: 
                                            <?php 
                                                echo $fact['fecha_emision'];
                                            ?>
                                        </p>
                                    </div>
                                    <div class ="d-flex align-items-center gap-5 flex-nowrap">
                                        <h5 class="mb-0 precio"><i class="bi bi-currency-dollar">
                                            <?php 
                                                echo number_format($fact['monto'],2,'.',',');
                                            ?>
                                        </i></h5>
                                       <!-- Ver -->
                                        <a href="#"><i class="bi bi-eye"></i></a>

                                        <!-- Descargar -->
                                        <a href="#"><i class="bi bi-download"></i></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 flex-nowrap">
                                    <i class="bi bi-dot"></i>
                                    <p class="mb-0">
                                        No. pedido:
                                        <?php 
                                            echo $fact['pedido_id'];
                                            ?>
                                    </p>
                                    <i class="bi bi-dot"></i>
                                    <p class="mb-0">Vence: 
                                        <?php 
                                            echo $fact['fecha_vencimiento'];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php endforeach; ?>
                    <?php else: ?>
                        <p>No se encontraron Facturas.</p>
                    <?php endif; ?>
                    
                    
                </div>
            </div>


        </div>



    </div>
        

    <script>
        //filtro para historial de facturas
        const input = document.getElementById('busqueda');
        const cards = document.querySelectorAll('#producto .col-12');

        input.addEventListener('input', () => {
            const filtro = input.value.toLowerCase().trim();

            cards.forEach(card => {
                const numeroFactura = card.querySelector('.card-title').textContent.toLowerCase();
                const idVenta = card.querySelector('.venta').textContent.toLowerCase(); // Ajusta si hay varios p.mb-0

                
                if(numeroFactura.includes(filtro) || idVenta.includes(filtro)){
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

</section>
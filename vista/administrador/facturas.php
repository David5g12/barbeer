<link rel="stylesheet" href="vista/css/facturas.css">

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
                                    <h5 class="card-text mb-0">$68,450</h5>
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
                                    <h5 class="card-text mb-0">3</h5>
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
                                    <h5 class="card-text mb-0">0</h5>
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
                    <div class="col-12 col-sm-6 col-md-4 col-lg-12 mb-2">
                        <div class="card h-100" >
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center flax-nowrap mb-0">
                                    <div class="d-flex align-items-center gap-2 flex-nowrap">
                                        <h5 class="card-title">P-001</h5>
                                        <h5 class="btn btn-warning py-1 px-2 mb-0">Pagada</h5>
                                        <p class="text-fecha mb-1">Emitida: 10 ene 2025</p>
                                    </div>
                                    <div class ="d-flex align-items-center gap-5 flex-nowrap">
                                        <h5 class="mb-0 precio"><i class="bi bi-currency-dollar">1500</i></h5>
                                       <!-- Ver -->
                                        <a href="#"><i class="bi bi-eye"></i></a>

                                        <!-- Descargar -->
                                        <a href="#"><i class="bi bi-download"></i></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 flex-nowrap">
                                    <p class="venta mb-0">Venta: S-001</p>
                                    <i class="bi bi-dot"></i>
                                    <p class="mb-0">3 productos</p>
                                    <i class="bi bi-dot"></i>
                                    <p class="mb-0">Vence: 09 feb 2025</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
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
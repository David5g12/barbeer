<link rel="stylesheet" href="vista/css/dashboard.css">

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
                                    <h5 class="card-title mb-0">Venta de hoy</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-currency-dollar"></i></h5>
                                </div>
                                <div class="p mb-0">
                                    <h5 class="card-text mb-0">$1500</h5>
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
                                    <h5 class="card-title mb-0">Venta de hoy</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-box-seam"></i></h5>
                                </div>
                                <div class="mb-0">
                                    <h5 class="card-text mb-0">$1500</h5>
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
                                    <h5 class="card-title mb-0">Venta de hoy</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-cart2"></i></h5>
                                </div>
                                <div class="mb-0">
                                    <h5 class="card-text mb-0">$1500</h5>
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
                                    <h5 class="card-title mb-0">Venta de hoy</h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-graph-up-arrow"></i></h5>
                                </div>
                                <div class="mb-0">
                                    <h5 class="card-text mb-0">$1500</h5>
                                    <p class="p card-text mb-0">Tequila, triple sec, limón y sal</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    

                    
                </div>
            </div>

        </div>


        
             
        <div id="actividades" class="container  my-0">
            <div class="row justify-content-between">
                <div class="col-12 col-md-5 custom-col ac_reciente">
                    <h6>Actividades recientes</h6>
                    <div id="producto" class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <h5 class="card-title">Venta realizada</h5>
                                        <h5 class="mb-0 precio"><i class="bi bi-currency-dollar">1500</i></h5>
                                    </div>
                                    <p>hace 5 min</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="producto" class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <h5 class="card-title">Producto agregado</h5>
                                        <h5 class="mb-0 precio"><i class="bi bi-currency-dollar">cerveza artesanal</i></h5>
                                    </div>
                                    <p>hace 5 min</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="producto" class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <h5 class="card-title">Compra registrada</h5>
                                        <h5 class="mb-0 precio"><i class="bi bi-currency-dollar">1500</i></h5>
                                    </div>
                                    <p>hace 5 min</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-12 col-md-5 custom-col prod_vendido">
                    <h6>Productos más vendidos</h6>
                    <div id="producto" class="container">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-0">
                                        <h5 class="card-title">Cerveza corona</h5>
                                        <h5 class="mb-0 precio"><i class="bi bi-currency-dollar">450</i></h5>
                                    </div>
                                    <p>40 unidades</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
         </div>
                
        
            
                  
                

            
        






    </div>
</section>
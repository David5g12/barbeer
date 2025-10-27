<link rel="stylesheet" href="vista/css/pedidos.css">

<section>
    <div class="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
    <div class="contenido">
        <div class ="encabezado">
            <div class="texto">
                <h2>Lista de pedidos</h2>
                <p>Visualizacion de pedidos</p>
            
            </div>
            
        </div>

        <div class="pedidos">
            <div class="container my-4">
                <div class="row">

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">Pedido</h5>
                                    <h5 class="mb-0 precio">total $ 45</h5>
                                </div>
                                
                                <p class="card-text">Confirmacion: enviado</p>
                                <p class="card-text">
                                    Numero de Mesa: 
                                    <select>
                                        <option value="Mesa-1">mesa 1</option>
                                        <option value="mesa-2">mesa 2</option>
                                    </select>
                                </p> 
                                <a class="btn btn-primary w-100" href="index.php?c=facturas&p=ticket">Pagar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">Pedido</h5>
                                    <h5 class="mb-0 precio">total $ 45</h5>
                                </div>
                                
                                <p class="card-text">Confirmacion: en preparacion</p>
                                <p class="card-text">mesa 2</p>
                                <a class="btn btn-primary w-100" href="index.php?c=facturas&p=ticket">Pagar</a>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

        </div>






    </div>




    
</section>
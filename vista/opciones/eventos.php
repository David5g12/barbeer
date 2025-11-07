<link rel="stylesheet" href="vista/css/eventos.css">

<section>
    <div class ="header">
        <?php
            require_once('vista/layout/header.php')
        ?>
    </div>
    <div class ="contenido">
        <div class="encabezado">
            <div class="texto">
                <h1>Combos y Promociones</h1>
                <p>Aprevecha nuestras promociones especiales y ahorra en tus bebidas y comida favorita </p>
            </div>  
        </div>

        <div class="sec_producto">
            
        
            <div id="producto" class="container my-4">
                <div class="row">
                     <?php if ($eventos && count($eventos) > 0): ?>
                        <?php foreach ($eventos as $event): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-categoria="Clasicos">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/<?php echo $event['img']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0">
                                        <?php echo htmlspecialchars($event['nombre']); ?>
                                    </h5>
                                    <h5 class="mb-0 precio">
                                        <?php echo htmlspecialchars($event['horario']); ?>
                                    </h5>
                                </div>
                                
                                <p class="card-text">
                                    <?php echo htmlspecialchars($event['descripcion']); ?>
                                </p>
                                <p class="card-text">
                                    <?php echo htmlspecialchars($event['promocion']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <p>No se encontraron Eventos.</p>
                    <?php endif; ?>
                    

                    

                    
                </div>
            </div>



            
        </div>


    </div>
</section>

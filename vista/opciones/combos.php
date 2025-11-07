<link rel="stylesheet" href="vista/css/combos.css">

<section>
    <div class="header">
        <?php
        require_once('vista/layout/header.php')
        ?>
    </div>
    <div class="contenido">
        <div class="encabezado">
            <div class="texto">
                <h1>Combos y Promociones</h1>
                <p>Aprevecha nuestras promociones especiales y ahorra en tus bebidas y comida favorita </p>
            </div>  
        </div>

        <div class="sec_producto">
            
            

            
            <div id="producto" class="container my-4">
                <div class="row">
                     <?php if ($combos && count($combos) > 0): ?>
                        <?php foreach ($combos as $comb): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" data-categoria="Clasicos">
                        <div class="card h-100">
                            <img class="card-img-top img-fluid" src="vista/img/<?php echo $comb['img']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="card-title mb-0"><?php echo $comb['nombre_combo']; ?></h5>
                                    <h5 class="mb-0 precio"><?php echo $comb['precio_promo']; ?></h5>
                                </div>
                                
                                <p class="card-text">Clasicos</p>
                                <p class="card-text"><?php echo $comb['descripcion']; ?></p>
                                <form method="post" action="index.php?c=agregarProducto&p=agregarProducto">
                                            <input type="number" name="cantidad" min="1" value="1">
                                            <input type="hidden" name="combo_id" value="<?php echo $comb['combo_id']; ?>">
                                            <input type="hidden" name="nombre_combo" value="<?php echo $comb['nombre_combo']; ?>">
                                            <input type="hidden" name="precio_promo" value="<?php echo $comb['precio_promo']; ?>">                                            
                                            <button type="submit" class="btn btn-primary w-100">Agregar al pedido</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <p>No se encontraron cervezas.</p>
                    <?php endif; ?>
                
                    
                </div>
            </div>



            
        </div>







    </div>
</section>
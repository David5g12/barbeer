<link rel="stylesheet" href="vista/css/TablaCombos.css">

<section>
    <div class="header" id="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
    <div class="contenido">
        <div class ="encabezado">
            <div class="texto">
                <h2>Combos</h2>
                <p>Diseña tus combos para promoción</p>
            
            </div>
            <div class="boton">
                <a href="index.php?c=combos&p=AgregarCombos" class="btn btn"><i class="bi bi-plus"></i>Crear combos</a>

            </div>
        </div>

        <div class="combos">
            <div class="container my-4">
                <div class="row" id="contenedor-cards">
                    <?php foreach($combos as $combo): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="img-container">
                            <img class="card-img-top img-fluid" src="vista/img/<?= $combo['img']; ?>" alt="Imagen del combo">
                            </div>

                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <h5 class="card-title mb-0"><?= $combo['nombre_combo'] ?></h5>
                                    <h5 class="mb-0 precio"><i class="bi bi-currency-dollar"><?= $combo['precio_promo']?></i></h5>   
                                </div>
                                <div class=" sup  mb-4">
                                    <h5>Ahorrate <?= $combo['ahorro']?></h5>
                                </div>
                                <div class="datos mb-1 d-flex flex-column gap-2">
                                    <p><?= $combo['descripcion']?></p>
                                    <p>Stock diponible: <?= $combo['stock_combos']?></p>
                                    
                                    
                                </div>
                                <div class="botones">
                                    <a href="index.php?c=combos&p=EditarCombos&id=<?= $combo['combo_id']?>" class="btn btn-edit"><i class="bi bi-pencil"></i>Editar</a>
                                    <a href="index.php?c=combos&p=EliminarCombos&id=<?= $combo['combo_id'] ?>" class="btn btn-delete"><i class="bi bi-trash"></i></a>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>


        



    </div>

    


</section>
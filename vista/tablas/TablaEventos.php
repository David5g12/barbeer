<link rel="stylesheet" href="vista/css/TablaEventos.css">

<section>
    <div class="header" id="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
    <div class="contenido">
        <div class ="encabezado">
            <div class="texto">
                <h2>Eventos</h2>
                <p>eventings</p>
            
            </div>
            <div class="boton">
                <a href="index.php?c=eventos&p=AgregarEventos" class="btn btn"><i class="bi bi-plus"></i>Crear combos</a>

            </div>
        </div>

        <div class="combos">
            <div class="container my-4">
                <div class="row" id="contenedor-cards">
                    <?php foreach($eventos as $evento): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="img-container">
                            <img class="card-img-top img-fluid" src="vista/img/<?= $evento['img']; ?>" alt="Imagen del combo">
                            </div>

                            <div class="card-body">
                                <!-- Contenedor flex para título y precio -->
                                <h5 class="card-title mb-0"><?= $evento['nombre'] ?></h5>  
                                <p class="descripcion"><?= $evento['descripcion']?></p>
                            
                                <div class="datos mb-1 d-flex flex-column gap-0">
                                    <p><?= $evento['dia_semana']?></p>
                                    <p><?= date("h:i A", strtotime($evento['horario']));?></p>
                                    <div class="Promocion">
                                        <h6>Promocion especial</h6>
                                        <p><?= $evento['promocion']?></p>

                                    </div>
                                </div>
                                <div class="botones">
                                    <a href="index.php?c=eventos&p=EditarEventos&id=<?= $evento['evento_id']?>" class="btn btn-edit"><i class="bi bi-pencil"></i>Editar</a>
                                    <a href="index.php?c=eventos&p=EliminarEventos&id=<?= $evento['evento_id']?>" class="btn btn-delete"><i class="bi bi-trash"></i></a>

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
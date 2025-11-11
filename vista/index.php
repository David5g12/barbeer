
<link rel="stylesheet" href="vista/css/Inicio.css">

<section class = "section">

<div class = "header">
    <?php
    require_once('layout/header.php')
    ?>

</div>

<div class="contenido">

  <div class="encabezado">

    <div class="texto">
      <h1>Descubre tu bebida perfecta</h1>
      <p>Explora nuestro menú digital con las mejores cervezas, cocteles y destilados.</p>
      <a href="index.php?c=index&p=index">
        <button>Ver Cervezas</button>
      </a>
      <a href="index.php?c=index&p=index">
        <button>Ver Promociones</button>
      </a>
    </div>
  </div>

  <?php
  
  $valor = "Viernes. 9:00pm . 10:00pm";
  $text = "Caraoke Night";
  $song = "Canta tus canciones favoritas";
  $promo = "2x1 en concteles durante el evento";
  ?>

  <div class="seccion2">
    
    <h1>Evento de Hoy</h1>
    <div class="img">
    
    </div>
    <div class="info">
      
      <input type="text" value="<?php echo $valor; ?> " readonly>
      <h1><?php echo $text; ?> </h1>
      <p><?php echo $song; ?></p>
      <input type="text" value="<?php  echo $promo; ?>" readonly class ="Input">
    </div>
  
  </div>

  <div id="producto" class="container my-4">
    <div class="row">
      <div class="col-12 text-center mb-3">
        <h1><b>Destacados del Día</b></h1>
      </div>
      <?php foreach($datosProducto as $producto):?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
          <div class="card">
            <div class="img-container">
              <img class="card-img-top img-fluid" src="vista/img/<?= $producto['img']?>" alt="Card image cap">
            </div>
              <div class="card-body">
              <!-- Contenedor flex para título y precio -->
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="card-title mb-0"><?= $producto['nombre_producto']?></h5>
                <h5 class="mb-0 precio"><?= $producto['precio_venta']?></h5>
              </div>
              
              <p class="card-text"><?= $producto['tipo']?></p>
              <p class="card-text"><?= $producto['descripcion']?></p>
              
            </div>
          </div>
        </div>
      <?php endforeach; ?>


      
    </div>
  </div>




  





</div>





</section>
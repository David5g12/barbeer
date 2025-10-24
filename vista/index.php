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
      <button>Ver Cervezas</button>
      <button>Ver Promociones</button>
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

      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
          <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
          <div class="card-body">
            <!-- Contenedor flex para título y precio -->
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h5 class="card-title mb-0">Corona Extra</h5>
              <h5 class="mb-0 precio">$ 45</h5>
            </div>
            
            <p class="card-text">Nacionales</p>
            <p class="card-text">Cerveza clara mexicana, refrescante y ligera</p>
            <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
          </div>
        </div>
      </div>


      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
          <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h5 class="card-title mb-0">APA Artesanal</h5>
              <h5 class="mb-0 precio">$ 75</h5>
            </div>
            <p class="card-text">Artesanales</p>
            <p class="card-text">India Pale Ale con notas criticas y amargor balaceado</p>
            <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
          
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
          <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h5 class="card-title mb-0">Barril Corona</h5>
              <h5 class="mb-0 precio">$ 50</h5>
            </div>
            <p class="card-text">De barril</p>
            <p class="card-text">Corona fresca directo del barril</p>
            <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100">
          <img class="card-img-top img-fluid" src="vista/img/corona.jpg" alt="Card image cap">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h5 class="card-title mb-0">Margarita</h5>
              <h5 class="mb-0 precio">$ 100</h5>
            </div>
            <p class="card-text">Clasicos</p>
            <p class="card-text">Tequila, triple sec, limón y sal</p>
            <a class="btn btn-primary w-100" href="index.php?p=paquetes">Agregar al pedido</a>
          </div>
        </div>
      </div>

      


      
      
    </div>
  </div>




  





</div>





</section>
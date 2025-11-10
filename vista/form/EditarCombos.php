<link rel="stylesheet" href="vista/css/FormGeneral.css">

<?php
foreach($datosCombo as $valor){
    $id = $valor['combo_id'];
    $nombre = $valor['nombre_combo'];
    $descripcion = $valor['descripcion'];
    $precio = $valor['precio_promo'];
    $ahorro = $valor['ahorro'];
    $stock = $valor['stock_combos'];
    $img = $valor['img'];

}
?>


<body class="body">
    <?php
    require_once('vista/layout/form.php');
    ?>
    <form action="index.php?c=combos&p=ActualizarCombos" method="POST" enctype="multipart/form-data" class="editar p-4 rounded shadow-sm" style="max-width: 500px; margin: auto;">
        
        
        <input type="hidden" class="form-control" readonly id="id" name="id" value="<?= $id?>"><br>
        

        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre?>"><br>
        </div>
        
        
        <div class="form-group">
            <label for="descripcion" style="font-weight: bold">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $descripcion?>"><br>
        </div>

            <!--cachar el stock actual para actualizar -->
        <input type="hidden" name="stock_actual" value="<?= $stock?>">

        <div class="form-group">
            <label for="Cantidad" style="font-weight: bold">Cantidad a ingresar:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value=""><br>
        </div>
    
        <div class="form-group">
            <label for="Precio" style="font-weight: bold">Precio compra:</label>
            <input type="number" class="form-control" id="precio" name="precio" value="<?= $precio?>"><br>
        </div>
        <div class="form-group">
            <label for="venta" style="font-weight: bold">Ahorro:</label>
            <input type="number" class="form-control" id="ahorro" name="ahorro" value="<?= $ahorro?>"><br>
        </div>
    
        <div class="form-group">
            <label for="imagen" style="font-weight: bold">Imagen:</label>
                <p>Imagen actual:</p>
                <img src="vista/img/<?= $img ?>" alt="Imagen actual" style="max-width: 100%; height: auto; border: 1px solid #ccc;">
        </div>
        <div class="form-group">
            <label for="imagen" style="font-weight: bold">Seleccionar Imagen:</label>
            <input type="file" class="form-control" id="img_nueva" name="img_nueva" accept="image/*" ><br>
        </div>

        <input type="hidden" name="img_actual" value="<?= $img?>">



        

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-primary" href="index.php?c=combos&p=TablaCombos">Salir</a>
        
    </form>

    
</body>

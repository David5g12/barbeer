<link rel="stylesheet" href="vista/css/FormGeneral.css">

<?php
foreach($datos as $valor){
    $id = $valor['producto_id'];
    $nombre = $valor['nombre_producto'];
    $categoria = $valor['categoria'];
    $tipo = $valor['tipo'];
    $descripcion = $valor['descripcion'];
    $precio_compra = $valor['precio_compra'];
    $precio_venta = $valor['precio_compra'];
    $stock = $valor['stock_unidades'];
    $alc_vol = $valor['alc_vol'];
    $img = $valor['img'];

}
?>


<body class="body">
    <?php
    require_once('vista/layout/form.php');
    ?>
    <form action="index.php?c=compras&p=ActualizarProducto" method="POST" enctype="multipart/form-data" class="editar p-4 rounded shadow-sm" style="max-width: 500px; margin: auto;">
        
        
        <input type="hidden" class="form-control" readonly id="id" name="id" value="<?= $id?>"><br>
        

        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre?>"><br>
        </div>
        
        <div class="form-group">
            <label for="categoria" style="font-weight: bold">Categoria:</label>
            <select id="categoria" name="categoria" class="form-select">
                    <option value="" disabled <?= empty($categoria) ? 'selected' : ''?> >Selecciona categoría</option>
                    <option value="Cervezas" <?= ($categoria == 'Cervezas')? 'selected' : '' ?>>Cervezas</option>
                    <option value="Cocteles" <?= ($categoria == 'Cocteles')? 'selected' : '' ?>>Cocteles</option>
                    <option value="Destilados" <?= ($categoria == 'Destilados')? 'selected' : '' ?>>Destilados</option>
                    <option value="Comida" <?= ($categoria == 'Comida')? 'selected' : '' ?>>Comida</option>
                    <option value="Combos" <?= ($categoria == 'Combos')? 'selected' : '' ?>>Combos</option>
                    <option value="Refrescos" <?= ($categoria == 'Refrescos')? 'selected' : '' ?>>Refrescos</option>
                    <option value="Botanas" <?= ($categoria == 'Botanas')? 'selected' : '' ?>>Botanas</option>
                    <option value="Otros" <?= ($categoria == 'Otros')? 'selected' : '' ?>>Otros</option>
            </select><br>
        </div>

        <div class="form-group">
            <label for="tipo" style="font-weight: bold">Tipo:</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $tipo?>"><br>
        </div>

        <div class="form-group">
            <label for="descripcion" style="font-weight: bold">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $descripcion?>"><br>
        </div>
    
        <div class="form-group">
            <label for="compra" style="font-weight: bold">Precio compra:</label>
            <input type="number" class="form-control" id="precio_compra" name="precio_compra" value="<?= $precio_compra?>"><br>
        </div>
        <div class="form-group">
            <label for="venta" style="font-weight: bold">Precio venta:</label>
            <input type="number" class="form-control" id="precio_venta" name="precio_venta" value="<?= $precio_venta?>"><br>
        </div>
            <!--cachar el stock actual para actualizar -->
        <input type="hidden" name="stock_actual" value="<?= $stock?>">

        <div class="form-group">
            <label for="Cantidad" style="font-weight: bold">Cantidad a ingresar:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value=""><br>
        </div>
        <div class="form-group">
            <label for="alcohol" style="font-weight: bold">Alcohol vol:</label>
            <input type="number" class="form-control" id="alc_vol" name="alc_vol" value="<?= $alc_vol?>"><br>
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
        <a class="btn btn-primary" href="index.php?c=compras&p=productos">Salir</a>
        
    </form>

    
</body>

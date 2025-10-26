<link rel="stylesheet" href="vista/css/FormGeneral.css">

<body class="body">
    <?php
    require_once('vista/layout/form.php');
    ?>
    <form action="" class="editar p-4 rounded shadow-sm" style="max-width: 500px; margin: auto;">
        <div class="form-group">
            <label for="id">Id:</label>
            <input type="number" class="form-control" readonly id="id" name="id" value=""><br>
        </div>

        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value=""><br>
        </div>
        
        <div class="form-group">
            <label for="categoria" style="font-weight: bold">Categoria:</label>
            <select id="opciones" name="opciones" class="form-select">
                    <option value="" selected disabled>Selecciona categoría</option>
                    <option value="1">cerveza</option>
                    <option value="2">Cocteles</option>
                    <option value="3">Destilados</option>
            </select><br>
        </div>

        <div class="form-group">
            <label for="tipo" style="font-weight: bold">Tipo:</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value=""><br>
        </div>

        <div class="form-group">
            <label for="descripcion" style="font-weight: bold">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value=""><br>
        </div>
    
        <div class="form-group">
            <label for="compra" style="font-weight: bold">Precio compra:</label>
            <input type="number" class="form-control" id="compra" name="compra" value=""><br>
        </div>
        <div class="form-group">
            <label for="venta" style="font-weight: bold">Precio venta:</label>
            <input type="number" class="form-control" id="venta" name="venta" value=""><br>
        </div>
        <div class="form-group">
            <label for="Cantidad" style="font-weight: bold">Cantidad disponible:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value=""><br>
        </div>
        <div class="form-group">
            <label for="alcohol" style="font-weight: bold">Alcohol vol:</label>
            <input type="number" class="form-control" id="alcohol" name="alcohol" value=""><br>
        </div>
        <div class="form-group">
            <label for="imagen" style="font-weight: bold">Imagen:</label>
                <p>Imagen actual:</p>
                <img src="vista/img/<?= $imagen ?>" alt="Imagen actual" style="max-width: 100%; height: auto; border: 1px solid #ccc;">
        </div>
        <div class="form-group">
            <label for="imagen" style="font-weight: bold">Seleccionar Imagen:</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required><br>
        </div>

        

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="hidden" name="p" value="actualizarDestino">
        <a class="btn btn-primary" href="index.php?c=compras&p=productos">Salir</a>
        
    </form>

    
</body>

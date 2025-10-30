<link rel="stylesheet" href="vista/css/FormGeneral.css">
<body class="body"> 
    <?php
    require_once('vista/layout/form.php');
    ?>

    <form action="index.php?c=compras&p=GuardarProducto" method="POST" enctype="multipart/form-data" class="editar p-4 rounded shadow-sm" style="max-width: 500px; margin: auto;">
        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre:</label>
            <input type="text" class="form-control bg" id="nombre" name="nombre" required><br>
        </div>
        <div class="form-group">
            <label for="categoria" style="font-weight: bold">Categoria:</label>
            <select id="categoria" name="categoria" class="form-select">
                    <option value="" selected disabled>Selecciona categoría</option>
                    <option value="Cervezas">Cervezas</option>
                    <option value="Cocteles">Cocteles</option>
                    <option value="Destilados">Destilados</option>
                    <option value="Comida">Comida</option>
                    <option value="Combos">Combos</option>
                    <option value="Refrescos">Refrescos</option>
                    <option value="Botanas">Botanas</option>
                    <option value="Otros">Otros</option>
            </select><br>
        </div>

        <div class="form-group">
            <label for="tipo" style="font-weight: bold">Tipo:</label>
            <input type="text" class="form-control bg" id="tipo" name="tipo" required><br>
        </div>

        <div class="form-group">
            <label for="descripcion" style="font-weight: bold">Descripción:</label>
            <input type="text" class="form-control bg" id="descripcion" name="descripcion" required><br>
        </div>

        <div class="form-group">
            <label for="compra" style="font-weight: bold">Precio compra:</label>
            <input type="number" class="form-control bg " id="precio_compra" name="precio_compra" required><br>
        </div>
        <div class="form-group">
            <label for="venta" style="font-weight: bold">Precio venta:</label>
            <input type="number" class="form-control bg " id="precio_venta" name="precio_venta" required><br>
        </div>
        <div class="form-group">
            <label for="cantidad" style="font-weight: bold">Cantidad:</label>
            <input type="number" class="form-control bg" id="stock" name="stock" required><br>
        </div>
        
        <div class="form-group">
            <label for="alcohol" style="font-weight: bold">Alcohol vol:</label>
            <input type="decimal" class="form-control bg" id="alc_vol" name="alc_vol" required><br>
        </div>


        <div class="form-group">
            <label for="imagen" style="font-weight: bold">Seleccionar Imagen:</label>
            <input type="file" class="form-control bg" id="img" name="img" accept="image/*" required><br>
        </div>

        
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a class="btn btn-primary" href="index.php?c=compras&p=productos">Salir</a>
    </form>



    












</body>



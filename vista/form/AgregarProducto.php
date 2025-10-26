<link rel="stylesheet" href="vista/css/FormGeneral.css">
<body class="body"> 
    <?php
    require_once('vista/layout/form.php');
    ?>

<form action="" class="editar p-4 rounded shadow-sm" style="max-width: 500px; margin: auto;">
    <div class="form-group">
        <label for="nombre" style="font-weight: bold">Nombre:</label>
        <input type="text" class="form-control bg" id="nombre" name="nombre" required><br>
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
        <input type="text" class="form-control bg" id="tipo" name="tipo" required><br>
    </div>

    <div class="form-group">
        <label for="descripcion" style="font-weight: bold">Descripción:</label>
        <input type="text" class="form-control bg" id="descripcion" name="descripcion" required><br>
    </div>

    <div class="form-group">
        <label for="compra" style="font-weight: bold">Precio compra:</label>
        <input type="number" class="form-control bg " id="compra" name="compra" required><br>
    </div>
    <div class="form-group">
        <label for="venta" style="font-weight: bold">Precio venta:</label>
        <input type="number" class="form-control bg " id="venta" name="venta" required><br>
    </div>
    <div class="form-group">
        <label for="cantidad" style="font-weight: bold">Cantidad:</label>
        <input type="number" class="form-control bg" id="cantidad" name="cantidad" required><br>
    </div>
    <div class="form-group">
        <label for="cantidad" style="font-weight: bold">Cantidad:</label>
        <input type="text" class="form-control bg" id="cantidad" name="cantidad" required><br>
    </div>
    <div class="form-group">
        <label for="alcohol" style="font-weight: bold">Alcohol vol:</label>
        <input type="decimal" class="form-control bg" id="alcohol" name="alcohol" required><br>
    </div>


    <div class="form-group">
        <label for="imagen" style="font-weight: bold">Seleccionar Imagen:</label>
        <input type="file" class="form-control bg" id="imagen" name="imagen" accept="image/*" required><br>
    </div>

    
    <button type="submit" class="btn btn-primary">Registrar</button>
    <input type="hidden" name="p" value="guardarDestino">
    <a class="btn btn-primary" href="index.php?c=compras&p=productos">Salir</a>
</form>

    












</body>



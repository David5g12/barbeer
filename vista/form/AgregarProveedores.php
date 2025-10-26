<link rel="stylesheet" href="vista/css/FormGeneral.css">
<body class="body"> 
    <?php
    require_once('vista/layout/form.php');
    ?>

    <form action="" class="editar p-4 rounded shadow-sm" style="max-width: 800px; margin: auto;">
        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre de empresa:</label>
            <input type="text" class="form-control bg" id="nombre" name="nombre" required><br>
        </div>
        
        <div class="form-group">
            <label for="tipo" style="font-weight: bold">Nombre usuario:</label>
            <input type="text" class="form-control bg" id="tipo" name="tipo" required><br>
        </div>

        <div class="form-group">
            <label for="descripcion" style="font-weight: bold">Correo electronico:</label>
            <input type="email" class="form-control bg" id="correo" name="correo" required><br>
        </div>

        <div class="form-group">
            <label for="cantidad" style="font-weight: bold">Telefono:</label>
            <input type="text" class="form-control bg" id="telefono" name="telefono" required><br>
        </div>
        <div class="form-group">
            <label for="alcohol" style="font-weight: bold">Direccion:</label>
            <input type="" class="form-control bg" id="alcohol" name="alcohol" required><br>
        </div>
        <div class="form-group">
            <label for="alcohol" style="font-weight: bold">Categoria suministrada:</label>
            <input type="decimal" class="form-control bg" id="alcohol" name="alcohol" required><br>
        </div>


        
        <button type="submit" class="btn btn-primary">Registrar</button>
        <input type="hidden" name="p" value="guardarDestino">
        <a class="btn btn-primary" href="index.php?c=proveedores&p=proveedores">Salir</a>
    </form>

    
</body>

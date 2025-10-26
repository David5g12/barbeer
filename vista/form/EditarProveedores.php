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
            <label for="nombre" style="font-weight: bold">Nombre empresa:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value=""><br>
        </div>
        <div class="form-group">
            <label for="usuario" style="font-weight: bold">Nombre usuario:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value=""><br>
        </div>
        
        <div class="form-group">
            <label for="correo" style="font-weight: bold">Correo electronico:</label>
            <input type="number" class="form-control" id="correo" name="correo" value=""><br>
        </div>

        <div class="form-group">
            <label for="telefono" style="font-weight: bold">Telefono:</label>
            <input type="number" class="form-control" id="telefono" name="telefono" value=""><br>
        </div>
    
        <div class="form-group">
            <label for="direccion" style="font-weight: bold">Dirreción:</label>
            <input type="text" class="form-control" id="dirrecion" name="Dirreccion" value=""><br>
        </div>
        <div class="form-group">
            <label for="categoria" style="font-weight: bold">Categoria suministrada:</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value=""><br>
        </div>
    

        <button type="submit" class="btn btn-primary">Guardar</button>
        <input type="hidden" name="p" value="actualizarDestino">
        <a class="btn btn-primary" href="index.php?c=proveedores&p=proveedores">Salir</a>
        
    </form>

    
</body>

<link rel="stylesheet" href="vista/css/FormGeneral.css">
<body class="body"> 
    <?php
    require_once('vista/layout/form.php');
    ?>

    <form action="index.php?c=proveedores&p=ResgistrarProveedores" method="POST" class="editar p-4 rounded shadow-sm" style="max-width: 800px; margin: auto;">
        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre de empresa:</label>
            <input type="text" class="form-control bg" id="empresa" name="n_empresa" required><br>
        </div>
        
        <div class="form-group">
            <label for="tipo" style="font-weight: bold">Nombre usuario:</label>
            <input type="text" class="form-control bg" id="c_nombre" name="c_nombre" required><br>
        </div>

        <div class="form-group">
            <label for="descripcion" style="font-weight: bold">Correo electronico:</label>
            <input type="email" class="form-control bg" id="c_email" name="c_email" required><br>
        </div>

        <div class="form-group">
            <label for="cantidad" style="font-weight: bold">Telefono:</label>
            <input type="text" class="form-control bg" id="c_telefono" name="c_telefono" required><br>
        </div>
        <div class="form-group">
            <label for="alcohol" style="font-weight: bold">Direccion:</label>
            <input type="" class="form-control bg" id="direccion" name="direccion" required><br>
        </div>
        <div class="form-group">
            <label for="alcohol" style="font-weight: bold">Categoria suministrada:</label>
            <input type="decimal" class="form-control bg" id="c_suministradas" name="c_suministradas" required><br>
        </div>


        
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a class="btn btn-primary" href="index.php?c=proveedores&p=proveedores">Salir</a>
    </form>

    
</body>

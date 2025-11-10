<link rel="stylesheet" href="vista/css/FormGeneral.css">
<?php
foreach($EditarProveedor as $valor){
    $id = $valor['proveedor_id'];
    $n_empresa = $valor['nombre'];
    $c_nombre = $valor['contacto_nombre'];
    $c_email = $valor['contacto_email'];
    $c_telefono = $valor['contacto_telefono'];
    $direccion = $valor['direccion'];
    $c_suministradas = $valor['categorias_suministradas'];

}
?>

<body class="body">
    <?php
    require_once('vista/layout/form.php');
    ?>
    <form action="index.php?c=proveedores&p=ActualizarProveedor" method="POST" class="editar p-4 rounded shadow-sm" style="max-width: 500px; margin: auto;">
        
        <input type="hidden" class="form-control" readonly id="id" name="id" value="<?= $id?>"><br>
        
    
        
        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre empresa:</label>
            <input type="text" class="form-control" id="n_empresa" name="n_empresa" value="<?= $n_empresa?>"><br>
        </div>
        <div class="form-group">
            <label for="usuario" style="font-weight: bold">Nombre usuario:</label>
            <input type="text" class="form-control" id="c_nombre" name="c_nombre" value="<?= $c_nombre ?>"><br>
        </div>
        
        <div class="form-group">
            <label for="correo" style="font-weight: bold">Correo electronico:</label>
            <input type="email" class="form-control" id="c_email" name="c_email" value="<?= $c_email?>"><br>
        </div>

        <div class="form-group">
            <label for="telefono" style="font-weight: bold">Telefono:</label>
            <input type="text" class="form-control" id="c_telefono" name="c_telefono" value=" <?= $c_telefono?>"><br>
        </div>
    
        <div class="form-group">
            <label for="direccion" style="font-weight: bold">Dirreción:</label>
            <input type="text" class="form-control" id="direcion" name="direccion" value=" <?= $direccion?>"><br>
        </div>
        <div class="form-group">
            <label for="categoria" style="font-weight: bold">Categoria suministrada:</label>
            <input type="text" class="form-control" id="c_suministradas" name="c_suministradas" value=" <?= $c_suministradas?>"><br>
        </div>
    

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-primary" href="index.php?c=proveedores&p=proveedores">Salir</a>
        
    </form>

    
</body>

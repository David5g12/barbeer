<link rel="stylesheet" href="vista/css/FormGeneral.css">

<?php

foreach($datosEvento as $valor){
    $id = $valor['evento_id'];
    $nombre = $valor['nombre'];
    $dia =$valor['dia_semana'];
    $horario = $valor['horario'];
    $descripcion = $valor['descripcion'];
    $promocion =$valor['promocion'];
    $img = $valor['img'];

}
?>


<body class="body">
    <?php
    require_once('vista/layout/form.php');
    ?>
    <form action="index.php?c=eventos&p=ActualizarEventos" method="POST" enctype="multipart/form-data" class="editar p-4 rounded shadow-sm" style="max-width: 500px; margin: auto;">
        
        
        <input type="hidden" class="form-control" readonly id="id" name="id" value="<?= $id?>"><br>
        

        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre?>"><br>
        </div>
        <div class="form-group">
            <label for="dia" style="font-weight: bold">Día:</label>
            <select id="dia" name="dia" class="form-select">
                    <option value="" disabled <?= empty($dia) ? 'selected' : ''?> >Selecciona categoría</option>
                    <option value="Lunes" <?= ($dia == 'Lunes')? 'selected' : '' ?>>Lunes</option>
                    <option value="Martes" <?= ($dia == 'Martes')? 'selected' : '' ?>>Martes</option>
                    <option value="Miercoles" <?= ($dia == 'Miercoles')? 'selected' : '' ?>>Miercoles</option>
                    <option value="Jueves" <?= ($dia == 'Jueves')? 'selected' : '' ?>>Jueves</option>
                    <option value="Viernes" <?= ($dia == 'Viernes')? 'selected' : '' ?>>Viernes</option>
                    <option value="Sabado" <?= ($dia == 'Sabado')? 'selected' : '' ?>>Sabado</option>
                    <option value="Domingo" <?= ($dia == 'Domingo')? 'selected' : '' ?>>Domingo</option>
            </select><br>
        </div>
        <div class="form-group">
            <label for="horario" style="font-weight: bold">Horario:</label>
            <input type="time" class="form-control" id="horario" name="horario" value="<?= $horario?>"><br>
        </div>

        <div class="form-group">
            <label for="descripcion" style="font-weight: bold">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $descripcion?>"><br>
        </div>

        <div class="form-group">
            <label for="promocion" style="font-weight: bold">Promoción:</label>
            <input type="text" class="form-control" id="promocion" name="promocion" value="<?= $promocion?>"><br>
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
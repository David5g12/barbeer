<link rel="stylesheet" href="vista/css/FormGeneral.css">
<body class="body"> 
    <?php
    require_once('vista/layout/form.php');
    ?>

    <form action="index.php?c=eventos&p=RegistrarEvento" method="POST" enctype="multipart/form-data" class="editar p-4 rounded shadow-sm" style="max-width: 500px; margin: auto;">
        <div class="form-group">
            <label for="nombre" style="font-weight: bold">Nombre:</label>
            <input type="text" class="form-control bg" id="nombre" name="nombre" required><br>
        </div>
        <div class="form-group">
            <div class="mb-3">
            <label for="dia" class="form-label">Selecciona el día</label>
            <select id="dia" name="dia" class="form-select">
                <option value="" selected disabled>Elige un día...</option>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>
            </div>
                        
        </div>
        
        
        <div class="form-group">
            <label for="horario" style="font-weight: bold">Horario:</label>
            <input type="time" class="form-control bg" id="horario" name="horario" required><br>
        </div>
        
        <div class="form-group">
            <label for="descripcion" style="font-weight: bold">Descripción:</label>
            <input type="text" class="form-control bg " id="descripcion" name="descripcion" required><br>
        </div>
        <div class="form-group">
            <label for="Promocion" style="font-weight: bold">Promoción:</label>
            <input type="text" class="form-control bg " id="Promocion" name="promocion" required><br>
        </div>
        

        <div class="form-group">
            <label for="imagen" style="font-weight: bold">Seleccionar Imagen:</label>
            <input type="file" class="form-control bg" id="img" name="img" accept="image/*" required><br>
        </div>

        
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a class="btn btn-primary" href="index.php?c=combos&p=TablaCombos">Salir</a>
    </form>

    


</body>



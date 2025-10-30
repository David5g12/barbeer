<link rel="stylesheet" href="Vista/css/NuevoPedido.css">


<section>
    <div class="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
    <div class="contenido">

        <div class="formulario">
            <h2>Crear Nuevo Pedido</h2>
            <form method="post" action="index.php?c=crearPedido&p=crearPedido">
                <label>Mesa:</label>
                <select name="mesa_id" required>
                    <?php foreach($mesas as $m): ?>
                        <option value="<?= $m['mesa_id'] ?>"><?= $m['nombre'] ?></option>
                    <?php  endforeach; ?>
                </select>
                <button type="submit">Crear Pedido</button>
            </form>

        </div>

       
        
    </div>




    
</section>
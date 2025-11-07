<link rel="stylesheet" href="vista/css/ticket.css">
<?php

?>
<body class="body">


    <div class="ticket">
        <div class="ticket-header">
            <div class="img">
                <!-- Aquí podrías poner un logo -->
            </div>
            <div class="nombre">
                <h2>Mi Tienda</h2>
                <p>RFC: XXXXXX123</p>
                <p>Fecha: <?= date('d/m/Y H:i') ?></p>
            </div>
        </div>

        <div class="ticket-body">
            <p><strong>Ticket: #</strong><?= $_SESSION['pedido_id'] ?></p>
            <p><strong>Mesero: # <?= $nombreempleado['nombre']?></p>
            <hr>

            <table class="ticket-items">
                <thead>
                    <tr>
                        <th>Producto / Combo</th>
                        <th>Cant.</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($detallePedido as $item):
                        // Si es producto, usa nombre_producto; si es combo, usa nombre_combo
                        $nombre = $item['nombre_producto'] ?? $item['nombre_combo'] ?? 'Desconocido';
                        $subtotal = $item['cantidad'] * $item['precio_unitario_al_momento'];
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($nombre) ?></td>
                        <td><?= $item['cantidad'] ?></td>
                        <td>$<?= number_format($item['precio_unitario_al_momento'], 2) ?></td>
                        <td>$<?= number_format($subtotal, 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <hr>
            <p class="ticket-total"><strong>Total:</strong> $<?= number_format($total, 2) ?></p>
            <p><strong>Método de pago:</strong> <?= $_POST['metodo_pago'] ?></p>
        </div>

        <div class="ticket-footer">
            <p>¡Gracias por su compra!</p>
            <p>Pedido <?= $_SESSION['pedido_id'] ?></p>
        </div>
    <form method="post" action="index.php?c=cerrarPedido&p=cerrarPedido">
        <input type="hidden" name="metodo_pago" value="<?= $_POST['metodo_pago'] ?>">
        <input type="hidden" name="pedido_id" value="<?= $_SESSION['pedido_id'] ?>">
    <button type="submit">Cerrar Pedido</button>
</form>

    </div>

    <script>    

        // Opcional: abrir ventana de impresión automáticamente
        window.print();
    </script>

</body>

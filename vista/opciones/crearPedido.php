
<?php 
session_start();
if (!isset($_SESSION['pedido_id']) || !isset($_SESSION['mesa_id'])) {
    header('Location: index.php?c=nuevoPedidoForm&p=nuevoPedidoForm');
    exit();
}
?>
<link rel="stylesheet" href="Vista/css/pedidos.css">


<section>
    <div class="header">
        <?php
        require_once('vista/layout/header.php');
        ?>
    </div>
     <div class="contenido">

<h2>Pedido #<?= $_SESSION['pedido_id'] ?></h2>
<h2>Mesa id#<?= $_SESSION['mesa_id'] ?></h2>

<h3>Productos agregados</h3>
<table border="1" style="width: 500px;     "  >
    <tr>
        <th>Item</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Subtotal</th>
    </tr>
    <?php 
    $total = 0;
    foreach($detallePedido as $item): 
        $nombre = $item['nombre_producto'] ?? $item['nombre_combo'] ?? 'Desconocido';
        $subtotal = $item['cantidad'] * $item['precio_unitario_al_momento'];
        $total += $subtotal;
    ?>
    <tr>
        <td><?= $nombre ?></td>
        <td><?= $item['cantidad'] ?></td>
        <td>$<?= number_format($item['precio_unitario_al_momento'],2) ?></td>
        <td>$<?= number_format($subtotal,2) ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td><strong>$<?= number_format($total,2) ?></strong></td>
    </tr>
</table>
<h3>Agregar Productos</h3>
<form method="post" action="index.php?c=agregarProducto&p=agregarProducto" id="formProducto">
    <select name="producto_id" id="selectProducto">
        <?php foreach($productos as $p): ?>
            <option value="<?= $p['producto_id'] ?>" data-precio="<?= $p['precio'] ?>">
                <?= $p['nombre_producto'] ?> - $<?= $p['precio'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="number" name="cantidad" min="1" value="1">
    <button type="submit">Agregar</button>
</form>

<h3>Agregar Combos</h3>
<form method="post" action="index.php?c=agregarProducto&p=agregarProducto" id="formCombo">
    <select name="combo_id" id="selectCombo">
        <?php foreach($combos as $c): ?>
            <option value="<?= $c['combo_id'] ?>" data-precio="<?= $c['precio_promo'] ?>">
                <?= $c['nombre_combo'] ?> - $<?= $c['precio_promo'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="number" name="cantidad" min="1" value="1">
    <button type="submit">Agregar</button>
</form>

<form method="post" action="index.php?c=cerrarPedido&p=cerrarPedido">
    <label>Metodo de Pago:</label>
    <select name="metodo_pago">
        <option value="Efectivo">Efectivo</option>
        <option value="Tarjeta">Tarjeta</option>
        <option value="Transferencia">Transferencia</option>
    </select>
    <button type="submit">Cerrar Pedido</button>
</form>


     </div>




    
</section>
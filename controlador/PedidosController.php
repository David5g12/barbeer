<?php
require_once('modelo/PedidosModel.php');
class PedidosController{
    private $PedidosModel;
    
    function __construct(){
        $this->PedidosModel = new PedidosModel();
    }
    public static function barra(){
        require_once('vista/opciones/barra.php');
    } //

    // Formulario nuevo pedido
    public static function nuevoPedidoForm() {
        $PedidosModel = new PedidosModel();
        $mesas = $PedidosModel->obtenerMesasLibres();
        include 'vista/opciones/nuevoPedido.php';
    }
    public static function crearObtener(){
        
        $PedidosModel = new PedidosModel();
        session_start();
        $pedido_id = $_SESSION['pedido_id'];
        $productos = $PedidosModel->obtenerProductos();
        $combos = $PedidosModel->obtenerCombos();
        $detallePedido = $PedidosModel->obtenerDetalle($pedido_id); //  aquí se carga lo actualizado
       

        include 'vista/opciones/crearPedido.php';
    }
    public static function crearPedido() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?c=nuevoPedidoForm&p=nuevoPedidoForm");
            exit();
        }

        $mesa_id = $_POST['mesa_id'] ?? null;
        $id_empleado = $_SESSION['id_empleado'] ?? null;

        if (!$mesa_id || !$id_empleado) {
            echo "<script>alert('Error: Mesa o empleado no definido');</script>";
            header("Location: index.php?c=nuevoPedidoForm&p=nuevoPedidoForm");
            exit();
        }

        $PedidosModel = new PedidosModel();
        $pedido_id = $PedidosModel->crearPedido($mesa_id, $id_empleado);
        if(!$pedido_id) {
            echo "<script>alert('Error al crear el pedido');</script>";
            header("Location: index.php?c=nuevoPedidoForm&p=nuevoPedidoForm");
            exit();
        }

        $_SESSION['pedido_id'] = $pedido_id;
        $_SESSION['mesa_id'] = $mesa_id;

        header("Location: index.php?c=crearObtener&p=crearObtener");
        exit();
}

    // Agregar productos o combos
    public static function agregarProducto() {
        session_start();
        $modelo = new PedidosModel();

        $pedido_id = $_SESSION['pedido_id'];
        $cantidad = $_POST['cantidad'];

        if (isset($_POST['producto_id']) && !empty($_POST['producto_id'])) {
            $producto_id = $_POST['producto_id'];
            $producto = $modelo->obtenerProductoPorId($producto_id);
            $precio = $producto['precio'];
            $modelo->agregarDetalle($pedido_id, $producto_id, null, $cantidad, $precio, 0);

        } elseif (isset($_POST['combo_id']) && !empty($_POST['combo_id'])) {
            $combo_id = $_POST['combo_id'];
            $combo = $modelo->obtenerComboPorId($combo_id);
            $precio = $combo['precio_promo'];
            $modelo->agregarDetalle($pedido_id, null, $combo_id, $cantidad, $precio, 1);
        }

        header("Location: index.php?c=crearObtener&p=crearObtener");
    }


    // Cerrar pedido
    public static function cerrarPedido() {
        session_start();
        $PedidosModel = new PedidosModel();
        $pedido_id = $_SESSION['pedido_id'];
        $metodo_pago = $_POST['metodo_pago'];
        $PedidosModel->cerrarPedido($pedido_id, $metodo_pago);

        unset($_SESSION['pedido_id'], $_SESSION['mesa_id']);
        header("Location: index.php?c=nuevoPedidoForm&p=nuevoPedidoForm");
    }
}
?>
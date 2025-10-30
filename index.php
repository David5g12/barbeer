<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('config.php');
require_once('controlador/IndexController.php');
require_once('controlador/DashboardController.php');
require_once('controlador/CervezasController.php');
require_once('controlador/CoctelesController.php');
require_once('controlador/DestiladosController.php');
require_once('controlador/CombosController.php');
require_once('controlador/EventosController.php');
require_once('controlador/loginController.php');
require_once('controlador/administradorController.php');
require_once('controlador/PedidosController.php');

require_once('controlador/ComprasController.php');
require_once('controlador/ProveedoresController.php');
require_once('controlador/ReportesController.php');
require_once('controlador/FacturasController.php');

//lista de controladores 
$controladores = [
    'index' => 'IndexController',
    'dashboard'  => 'DashboardController',
    'cervezas' => 'CervezasController',
    'cocteles' => 'CoctelesController',
    'destilados' => 'DestiladosController',
    'combos' => 'CombosController',
    'eventos' => 'EventosController',
    'sesion' => 'loginController',
    'registro' => 'loginController',
    'registrarse' => 'loginController',
    'iniciarSesion' => 'loginController',
    'cerrarSesion' => 'loginController',
    'proveedores' => 'ProveedoresController',
    'reportes' => 'ReportesController',
    'facturas' => 'FacturasController',
    'compras' => 'ComprasController',
    'ventas' => 'administradorController',
    'compras_pro' => 'administradorController',
    'pedidos' => 'PedidosController',
    'nuevoPedidoForm' => 'PedidosController',
    'crearPedido' => 'PedidosController',
    'agregarProducto' => 'PedidosController',
    'cerrarPedido' => 'PedidosController',
    'obtenerDetallePedido' => 'PedidosController',
    'eliminarProductopedido' => 'PedidosController',
    'cancelarPedido' => 'PedidosController'
];

$metodosPermitidos = [
    'IndexController' => ['index'],
    'DashboardController' => ['dashboard'],
    'CervezasController' => ['cervezas'],
    'CoctelesController' => ['cocteles'],
    'DestiladosController' => ['destilados'],
    'CombosController' => ['combos'],
    'EventosController' => ['eventos'],
    'administradorController' => ['facturas','ventas','compras_pro'],
    'loginController' => ['sesion', 'registro', 'iniciarSesion', 'cerrarSesion', 'registrarse'],
    

    'ComprasController' =>['compras','productos','AgregarProducto','GuardarProducto','EditarProducto','ActualizarProducto','EliminarProductos'],
    'ProveedoresController' => ['proveedores','AgregarProveedores','EditarProveedores'],
    'ReportesController' =>['reportes'],
    'FacturasController' => ['facturas','ticket','factura'],
    'PedidosController' => ['pedidos','barra', 'nuevoPedidoForm', 'crearPedido', 'agregarProducto', 'cerrarPedido', 'obtenerDetallePedido', 'eliminarProductopedido', 'cancelarPedido'],

];

//modo de manejo con post y get
$controladorkey = $_GET['c'] ?? $_POST['c'] ?? 'index'; 
$metodo   = $_GET['p'] ?? $_POST['p'] ?? 'index';

if(array_key_exists($controladorkey,$controladores)){
    $controladorclass = $controladores[$controladorkey];

    if(in_array($metodo,$metodosPermitidos[$controladorclass]) && method_exists($controladorclass,$metodo)){
        $controladorclass::{$metodo}();
    }
    else{
        echo "Metodo no permitido";
    }

}
else{
    echo"Controlador no encontrado";
}

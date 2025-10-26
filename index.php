<?php
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
require_once('controlador/pedidoController.php');

require_once('controlador/ComprasController.php');
require_once('controlador/ProveedoresController.php');

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
    'reportes' => 'administradorController',
    'facturas' => 'administradorController',
    'compras' => 'ComprasController',
    'ventas' => 'administradorController',
    'compras_pro' => 'administradorController',
    'pedido' => 'pedidoController'

];

$metodosPermitidos = [
    'IndexController' => ['index'],
    'DashboardController' => ['dashboard'],
    'CervezasController' => ['cervezas'],
    'CoctelesController' => ['cocteles'],
    'DestiladosController' => ['destilados'],
    'CombosController' => ['combos'],
    'EventosController' => ['eventos'],
    'administradorController' => ['reportes','facturas','ventas','compras_pro'],
    'loginController' => ['sesion', 'registro', 'iniciarSesion', 'cerrarSesion', 'registrarse'],
    'pedidoController' => ['pedido'],

    'ComprasController' =>['compras','productos','AgregarProducto','EditarProducto'],
    'ProveedoresController' => ['proveedores','AgregarProveedores','EditarProveedores']
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

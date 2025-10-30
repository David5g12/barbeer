<?php
require_once('modelo/ComprasModel.php');
class ComprasController{
    private $ComprasModel;

    function __construct(){
        $this->ComprasModel = new ComprasModel();
    }

    public static function compras(){
        require_once('vista/administrador/compras.php');
    }
    
    public static function productos(){
        $productos = new ComprasModel();
        $datos =$productos->ConsultaProducto();
        require_once('vista/tablas/productos.php');
    }
    
    public static function AgregarProducto(){
        require_once('vista/form/AgregarProducto.php');
    }

    public static function GuardarProducto(){
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $precio_compra =$_POST['precio_compra'];
        $precio_venta =$_POST['precio_venta'];
        $stock = $_POST['stock'];
        $alc_vol = $_POST['alc_vol'];

        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // Guardar solo el nombre del archivo de la imagen
            $nombreArchivo = basename($_FILES['img']['name']);
            $rutaDestino = 'vista/img/' . $nombreArchivo;
    
            // Mover la imagen al directorio destino
            if (move_uploaded_file($_FILES['img']['tmp_name'], $rutaDestino)) {
                // Aquí guardamos solo el nombre de la imagen en la base de datos
                $InsertarProdutos = new ComprasModel();
                $InsertarProdutos->InsertarProducto($nombre,$categoria,$tipo,$descripcion,$precio_compra,$precio_venta,$stock,$alc_vol,$nombreArchivo);
                header("location:".urlsite."index.php?c=compras&p=productos");
                
            } else {
                echo "Error al mover la imagen.";
            }
        } else {
            echo "No se subió imagen o hubo un error.";
        }
        
        
    }
    
    public static function EditarProducto(){
        $id_producto = $_GET['id'];
        $DatosProducto = new ComprasModel();
        $datos = $DatosProducto->EditarProducto($id_producto);
        require_once('vista/form/EditarProducto.php');
    }
    public static function ActualizarProducto(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $precio_compra =$_POST['precio_compra'];
        $precio_venta =$_POST['precio_venta'];
        $stock_actual = (INT) $_POST['stock_actual'];
        $cantidad = (INT) $_POST['cantidad'];
        $alc_vol = $_POST['alc_vol'];

        if (isset($_FILES['img_nueva']) && $_FILES['img_nueva']['error'] === UPLOAD_ERR_OK) {
            // Si se sube una nueva imagen
            $nombreArchivo = basename($_FILES['img_nueva']['name']);
            $rutaDestino = 'vista/img/' . $nombreArchivo;

            // Mover la imagen de la carpeta temporal a la carpeta destino
            if (move_uploaded_file($_FILES['img_nueva']['tmp_name'], $rutaDestino)) {
                // Si se movió correctamente
                $img = $nombreArchivo;

                // Ahora eliminar la imagen anterior
                if (!empty($_POST['img_actual'])) {
                    $rutaImagenAnterior = 'vista/img/' . $_POST['img_actual'];

                    // Verificar que no sea una imagen por defecto (opcional)
                    if (file_exists($rutaImagenAnterior) && $_POST['img_actual'] !== 'default.jpg') {
                        unlink($rutaImagenAnterior);
                    }
                }
            } else {
                echo "Error al mover la imagen.";
                return;
            }
        } else {
            // Si no se sube una nueva imagen, mantener la imagen actual
            $img = $_POST['img_actual'];
        }


        $ActualizarStock = $stock_actual + $cantidad;

        $actualizar = new ComprasModel();
        $actualizar->ActualizarProducto($id,$nombre,$categoria,$tipo,$descripcion,$precio_compra,$precio_venta,$ActualizarStock,$alc_vol,$img);
        header("location:".urlsite."index.php?c=compras&p=productos");
    }

    public static function EliminarProductos(){
        $id = $_GET['id'];
        $eliminar = new ComprasModel();
        $eliminar->EliminarProducto($id);
        header("location:".urlsite."index.php?c=compras&p=productos");

    }
}
?>

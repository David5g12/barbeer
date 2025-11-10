<?php
require_once('modelo/CombosModel.php');
class CombosController{

    private $CombosModel;
    function __construct(){
        $this->CombosModel = new CombosModel();
    }
    public static function combos(){
        $combos = self::obtenerCombos();
        require_once('vista/opciones/combos.php');
    }
    public static function obtenerCombos(){
        $combosModel = new CombosModel();
        $combos = $combosModel->ConsultarCombos();
        require_once('vista/opciones/combos.php');

    }
    public static function TablaCombos(){
        $combosModel = new CombosModel();
        $combos = $combosModel->ConsultarCombos();
        require_once('vista/tablas/TablaCombos.php');
    }
    public static function AgregarCombos(){
        require_once('vista/form/AgregarCombos.php');

    }
    public static function RegistrarCombos(){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio =$_POST['precio'];
        $ahorro =$_POST['ahorro'];
        $stock = $_POST['stock'];

        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // Guardar solo el nombre del archivo de la imagen
            $nombreArchivo = basename($_FILES['img']['name']);
            $rutaDestino = 'vista/img/' . $nombreArchivo;
    
            // Mover la imagen al directorio destino
            if (move_uploaded_file($_FILES['img']['tmp_name'], $rutaDestino)) {
                // Aquí guardamos solo el nombre de la imagen en la base de datos
                $Insertar = new CombosModel();
                $Insertar->AgregarCombo($nombre,$descripcion,$stock,$precio,$ahorro,$nombreArchivo);
                header("location:".urlsite."index.php?c=combos&p=TablaCombos");
                
            } else {
                echo "Error al mover la imagen.";
            }
        } else {
            echo "No se subió imagen o hubo un error.";
        }

    }
    public static function EditarCombos(){
        $id = $_GET['id'];
        $editarCombo = new CombosModel();
        $datosCombo = $editarCombo->EditarCombo($id);
        require_once('vista/form/EditarCombos.php');
    }
    public static function ActualizarCombos(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock_actual = (INT) $_POST['stock_actual'];
        $cantidad = (INT) $_POST['cantidad'];
        $precio =$_POST['precio'];
        $ahorro =$_POST['ahorro'];

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

        $actualizar = new CombosModel();
        $actualizar->ActualizarCombo($id,$nombre,$descripcion,$ActualizarStock,$precio,$ahorro,$img);
        header("location:".urlsite."index.php?c=combos&p=TablaCombos");

    }
    public static function EliminarCombos(){
        $id = $_GET['id'];
        $eliminar = new CombosModel();
        $eliminar->EliminarCombo($id);
        header("location:".urlsite."index.php?c=combos&p=TablaCombos");
    }
}
?>
<?php
require_once('modelo/EventosModel.php');
class EventosController{
    private $EventosModel;

    function __construct(){
        $this->EventosModel = new EventosModel();
    }
    
    public static function eventos(){
        $eventosModel = new EventosModel(); 
        $eventos = $eventosModel->obtenerEventos();
        require_once('vista/opciones/eventos.php');
    }
    public static function TablaEventos(){
        $eventosModel = new EventosModel(); 
        $eventos = $eventosModel->obtenerEventos();
        require_once('vista/tablas/TablaEventos.php');
    }
    public static function AgregarEventos(){
        require_once('vista/form/AgregarEventos.php');
    }
    public static function RegistrarEvento(){
        $nombre = $_POST['nombre'];
        $dia = $_POST['dia'];
        $horario = $_POST['horario'];
        $descripcion = $_POST['descripcion'];
        $promocion = $_POST['promocion'];
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            // Guardar solo el nombre del archivo de la imagen
            $nombreArchivo = basename($_FILES['img']['name']);
            $rutaDestino = 'vista/img/' . $nombreArchivo;
    
            // Mover la imagen al directorio destino
            if (move_uploaded_file($_FILES['img']['tmp_name'], $rutaDestino)) {
                // Aquí guardamos solo el nombre de la imagen en la base de datos
                $evento = new EventosModel();
                $evento->AgregarEvento($nombre,$dia,$horario,$descripcion,$promocion,$nombreArchivo);
                header("location:".urlsite."index.php?c=eventos&p=TablaEventos");
                
            } else {
                echo "Error al mover la imagen.";
            }
        } else {
            echo "No se subió imagen o hubo un error.";
        }

    }
    public static function EditarEventos(){
        $id = $_GET['id'];
        $editar = new EventosModel();
        $datosEvento = $editar->EditarEvento($id);
        require_once('vista/form/EditarEventos.php');
    }
    public static function ActualizarEventos(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $dia = $_POST['dia'];
        $horario = $_POST['horario'];
        $descripcion = $_POST['descripcion'];
        $promocion = $_POST['promocion'];

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
        $evento = new EventosModel();
        $evento->ActualizarEvento($id,$nombre,$dia,$horario,$descripcion,$promocion,$img);
        header("location:".urlsite."index.php?c=eventos&p=TablaEventos");

    }

    public static function EliminarEventos(){
        $id = $_GET['id'];
        $eliminar = new EventosModel();
        $eliminar->EliminarEvento($id);
        header("location:".urlsite."index.php?c=eventos&p=TablaEventos");
    }
    
}


?>
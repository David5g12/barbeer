<?php
class EventosModel{
    public function obtenerEventos(){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM EVENTOS;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $eventos;
    }
    public function AgregarEvento($nombre,$dia,$horario,$descripcion,$promocion,$img){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $insertar = "INSERT INTO eventos(nombre,dia_semana,horario,descripcion,promocion,img)
        VALUES(:nombre,:dia,:horario,:descripcion,:promocion,:img)";
        $insertarEvent = $conexion->prepare($insertar);
        $insertarEvent->execute([
            ':nombre' => $nombre,
            ':dia' => $dia,
            ':horario' => $horario,
            ':descripcion' => $descripcion,
            ':promocion' => $promocion,
            ':img' => $img
        ]);
        if($insertarEvent){
            return true;
        }
        else{
            return false;
        }

    }

    public function EditarEvento($id){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $editar ="SELECT* FROM eventos WHERE evento_id=:id";
        $editarEvent = $conexion->prepare($editar);
        $editarEvent->bindParam(':id', $id, PDO::PARAM_INT);
        $editarEvent->execute();
        $evento =$editarEvent->FETCHALL(PDO::FETCH_ASSOC);
        return $evento;

    }

    public function ActualizarEvento($id,$nombre,$dia,$horario,$descripcion,$promocion,$img){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $Actualizar ="UPDATE eventos SET nombre=:nombre,dia_semana=:dia,horario=:horario,descripcion=:descripcion,
        promocion=:promocion,img=:img WHERE evento_id=:id";
        $ActualizarEvent = $conexion->prepare($Actualizar);
        $ActualizarEvent->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':dia' =>$dia,
            ':horario' =>$horario,
            ':descripcion' =>$descripcion,
            ':promocion' =>$promocion,
            ':img' =>$img
        ]);
        if($ActualizarEvent){
            return true;
        }
        else{
            return false;
        }


    }

    public function EliminarEvento($id){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $eliminar ="DELETE FROM eventos WHERE evento_id=:id";
        $eliminarEvent = $conexion->prepare($eliminar);
        $eliminarEvent->bindParam(':id',$id, PDO::PARAM_INT);
        $eliminarEvent->execute();
        if($eliminarEvent){
            return true;
        }
        else{
            return false;
        }

    }
}
?>
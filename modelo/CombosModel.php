<?php
class CombosModel{

    public function ConsultarCombos(){
       include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
            SELECT * FROM COMBOS;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $combos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $combos;
    }

    public function AgregarCombo($nombre,$descripcion,$stock,$precio,$ahorro,$img){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $insertar = "INSERT INTO combos(nombre_combo,descripcion,stock_combos,precio_promo,ahorro,img)
        values(:nombre_combo,:descripcion,:stock,:precio,:ahorro,:img)";
        $insertarCombo = $conexion->prepare($insertar);
        $insertarCombo->execute([
            ':nombre_combo' => $nombre,
            ':descripcion' => $descripcion,
            ':stock' => $stock,
            ':precio' =>$precio,
            ':ahorro' =>$ahorro,
            ':img' => $img

        ]);
        if($insertarCombo){
            return true;
        }
        else{
            return false;
        }
       
    }
    public function EditarCombo($id){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $consulta = "SELECT*FROM combos WHERE combo_id=:id ";
        $consultaCombo = $conexion->prepare($consulta);
        $consultaCombo->bindParam(':id',$id, PDO::PARAM_INT);
        $consultaCombo->execute();
        $datosCombo = $consultaCombo->FETCHALL(PDO::FETCH_ASSOC);
        return $datosCombo;

    }
    public function ActualizarCombo($id,$nombre,$descripcion,$ActualizarStock,$precio,$ahorro,$img){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $actualizar = "UPDATE combos SET nombre_combo =:nombre,descripcion=:descripcion,stock_combos=:stock,precio_promo=:precio,ahorro=:ahorro,img=:img 
        WHERE combo_id=:id";
        $actualizarCom = $conexion->prepare($actualizar);
        $actualizarCom->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':descripcion' =>$descripcion,
            ':stock' =>$ActualizarStock,
            ':precio' =>$precio,
            ':ahorro' => $ahorro,
            ':img' =>$img
        ]);
        if($actualizarCom){
            return true;
        }
        else{
            return false;
        }
    }
    public function EliminarCombo($id){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $eliminar ="DELETE FROM combos WHERE combo_id=:id";
        $eliminarCom = $conexion->prepare($eliminar);
        $eliminarCom->bindParam('id',$id, PDO::PARAM_INT);
        $eliminarCom->execute();
        if($eliminarCom){
            return true;
        }
        else{
            return false;
        }


    }
    
}
?>
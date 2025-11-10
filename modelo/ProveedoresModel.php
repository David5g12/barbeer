<?php
class ProveedoresModel{
    public function TotalProveedores(){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
           SELECT COUNT(*) AS total_proveedores
            FROM proveedores;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $proveedores;
    }
    public function DatosProveedores(){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        

        $consulta = "
           select * from proveedores;
        ";

        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $proveedores;
    }

    public function RegistrarProveedor($n_empresa,$c_nombre,$c_email,$c_telefono,$direccion,$c_suministradas){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $insertar ="INSERT INTO proveedores(nombre,contacto_nombre,contacto_email,contacto_telefono,direccion,categorias_suministradas)
        VALUES(:n_empresa,:c_nombre,:c_email,:c_telefono,:direccion,:c_suministradas)";
        $insertarP = $conexion->prepare($insertar);
        $insertarP->execute([
            ':n_empresa' => $n_empresa,
            ':c_nombre' => $c_nombre,
            ':c_email' => $c_email,
            ':c_telefono' =>$c_telefono,
            ':direccion' => $direccion,
            ':c_suministradas' =>$c_suministradas
        ]);
        if($insertarP){
            return true;
        }
        else{
            return false;
        }

    }

    public function EditarProveedor($id_proveedor){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $consulta = "SELECT*from proveedores WHERE proveedor_id =:id_proveedor";
        $consultaProv = $conexion->prepare($consulta);
        $consultaProv->bindParam(':id_proveedor',$id_proveedor, PDO::PARAM_INT);
        $consultaProv->execute();

        $proveedor = $consultaProv->fetchall(PDO::FETCH_ASSOC);
        return $proveedor;
    }

    public function ActualizarProveedores($id,$n_empresa,$c_nombre,$c_email,$c_telefono,$direccion,$c_suministradas){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $Actualizar = "UPDATE proveedores SET nombre =:n_empresa,contacto_nombre =:c_nombre,contacto_email =:c_email,
        contacto_telefono =:c_telefono,direccion =:direccion,categorias_suministradas =:c_suministradas WHERE proveedor_id =:id";
        $ActualizarProv = $conexion->prepare($Actualizar);
        $ActualizarProv->execute([
            ':id' => $id,
            ':n_empresa' => $n_empresa,
            ':c_nombre' => $c_nombre,
            ':c_email' => $c_email,
            ':c_telefono' => $c_telefono,
            ':direccion' => $direccion,
            ':c_suministradas' => $c_suministradas

        ]);
        if($ActualizarProv){
            return true;
        }
        else{
            return false;
        }
    }
    public function EliminarProveedor($id){
        include_once('conexion.php');
        $conexion = Conexion::getInstancia();
        $eliminar ="DELETE FROM proveedores WHERE proveedor_id =:id";
        $eliminarProv =$conexion->prepare($eliminar);
        $eliminarProv->bindParam(':id', $id, PDO::PARAM_INT);
        $eliminarProv->execute();
        if($eliminarProv){
            return true;

        }
        else{
            return false;
        }


    }

    




}
?>
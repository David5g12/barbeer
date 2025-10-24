<?php
class loginModel{
     public function iniciarSesion($username, $password) {
        include_once('conexion.php');
        $cnn = new Conexion();

        $consulta = "SELECT * FROM empleado WHERE usuario = :usuario";
        $resultado = $cnn->prepare($consulta);
        $resultado->bindParam(':usuario', $username);
        $resultado->execute();
        $user = $resultado->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return [
                'id' => $user['id'],
                'usuario' => $user['usuario'],
                'rol' => !empty($user['administrador']) && $user['administrador'] == 1 ? 'admin' : 'empleado'
            ];
        }

        return false;
    }
    public function registrarse($nombre, $email, $username, $password) {
        include_once('conexion.php');
        $cnn = new Conexion();
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $consulta = "INSERT INTO empleado (nombre, correo, usuario, password) VALUES (:nombre, :correo, :usuario, :password)";
        $resultado = $cnn->prepare($consulta);
        $resultado->bindParam(':nombre', $nombre);
        $resultado->bindParam(':correo', $email);
        $resultado->bindParam(':usuario', $username);
        $resultado->bindParam(':password', $passwordHash);
       
        try {
            return $resultado->execute();
        } catch (PDOException $e) {
            // Si el error es por clave única duplicada
            if ($e->getCode() == '23000') { // Código de error SQL para violación de clave única
                return false; // Retornar false si el usuario o correo ya existe
            }
            return ['error' => $e->getMessage()]; 
        }
    
    }
}
?>
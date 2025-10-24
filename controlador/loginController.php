<?php
require_once('modelo/loginModel.php');
class loginController{
    private $loginModel;
    function __costruct(){
        $this->loginModel = new loginModel();
    }

    public static function sesion(){
        require_once('vista/login/sesion.php');
    }
    public static function registro(){
        require_once('vista/login/registro.php');
    }
    public static function iniciarSesion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['usuario'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($username === '' || $password === '') {
                echo "Por favor, ingrese usuario y contraseña.";
                return;
            }

            $loginModel = new loginModel();
            $userData = $loginModel->iniciarSesion($username, $password);

            if ($userData !== false) {
                session_start();
                $_SESSION['id'] = $userData['id'];         // ← ahora sí asignamos el id correcto
                $_SESSION['usuario'] = $userData['usuario'];
                $_SESSION['rol'] = $userData['rol'];

                header("Location: index.php?c=index&p=index&id=".$userData['id']);
                exit();
            } else {
                echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
                require_once("vista/login/sesion.php");
            }
        }
    }
    public static function cerrarSesion() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?c=index&p=index");
        exit();
    }
    public static function registrarse() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                !empty($_POST['nombre']) && // Validar que el nombre no esté vacío //!empaty sirve para validar que no sea nulo
                !empty($_POST['email']) &&
                !empty($_POST['username']) &&
                !empty($_POST['password'])
            ) {
                $nombre = trim($_POST['nombre']);// Eliminar espacios en blanco al inicio y al final el 
                $email = trim($_POST['email']);
                $username = trim($_POST['username']);
                $password = $_POST['password']; // CONTRASEÑA SIN HASH

                $loginModel = new loginModel();
                $success = $loginModel->registrarse($nombre, $email, $username, $password);

                if ($success === true) {
                    header('Location: index.php?c=sesion&p=sesion&alert=registrado');
                    exit();
                } else if ($success === false) {
                    echo"<script>alert('Error al registrar el usuario. El nombre de usuario o correo electrónico ya existe.');</script>";
                    require_once("vista/login/registro.php");
                }
            } else {
                echo"<script>alert('Por favor, complete todos los campos.');</script>";
                require_once("vista/login/registro.php");
            }
        }
    }
}
?>
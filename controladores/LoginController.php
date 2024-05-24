<?php
session_start();
require_once '../modelos/UsuarioModel.php';

class LoginController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function login() {
        if (empty($_POST['nombreUsuario']) || empty($_POST['contraseña'])) {
            echo "Por favor, completa todos los campos.";
            return;
        }

        $nombreUsuario = $_POST['nombreUsuario'];
        $contraseña = $_POST['contraseña'];

        $usuario = $this->usuarioModel->verificarUsuario($nombreUsuario, $contraseña);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario['nombreUsuario']; // Guardar nombre de usuario en sesión
            header("Location: ../vista/V_V_Producto/index.html"); // Redireccionar a la página principal
            exit();
        } else {
            echo "Error en las credenciales.";
        }
    }
}

$controller = new LoginController();
$controller->login();

?>

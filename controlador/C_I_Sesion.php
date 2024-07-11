<?php
require_once '../modelo/M_I_Sesion.php';  // Asegúrate de que la ruta al archivo del modelo es correcta

class LoginController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombreUsuario = $_POST['nombreUsuario'];
            $contraseña = $_POST['contraseña'];

            $usuario = $this->usuarioModel->obtenerUsuarioPorNombre($nombreUsuario);
            if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
                session_start();
                $_SESSION['usuarioID'] = $usuario['usuarioID'];
                $_SESSION['clienteID'] = $usuario['clienteID'];  // También almacena el clienteID en la sesión
                header("Location: ../vista/V_V_Producto/index.php");
                exit();
            } else {
                header("Location: ../vista/V_I_Sesion/login.php?error=credenciales");
            }
        }
    }
}

$controller = new LoginController();
$controller->login();
?>
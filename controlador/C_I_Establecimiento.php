<?php
require_once '../modelo/M_I_Establecimiento.php';

class LoginController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombreUsuario = $_POST['nombreUsuario'];
            $contraseña = $_POST['contraseña'];

            $usuarioData = $this->usuarioModel->verificarUsuario($nombreUsuario, $contraseña);

            if (is_array($usuarioData) && password_verify($contraseña, $usuarioData['contraseña'])) {
                session_start();
                $_SESSION['usuarioID'] = $usuarioData['usuarioID']; // Utiliza el ID del usuario
                header("Location: ../vista/V_A_Menu/index.php");
                exit();
            } else {
                header("Location: ../vista/V_I_Establecimiento/login.php?error=credenciales");
            }
        }
    }
}

$controller = new LoginController();
$controller->login();
?>
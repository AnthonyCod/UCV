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

            $usuarioID = $this->usuarioModel->verificarUsuario($nombreUsuario, $contraseña);
            if ($usuarioID && password_verify($contraseña, $usuarioID['contraseña'])) {
                session_start();
                $_SESSION['usuarioID'] = $usuarioID;
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
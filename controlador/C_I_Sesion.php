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

            $ids = $this->usuarioModel->verificarUsuario($nombreUsuario, $contraseña);
            if ($ids) {
                session_start();
                $_SESSION['usuarioID'] = $ids['usuarioID'];
                $_SESSION['clienteID'] = $ids['clienteID'];  // También almacena el clienteID en la sesión
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

<?php
require_once '../modelos/M_I_Sesion.php';

class LoginController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombreUsuario = $_POST['nombreUsuario'];
            $contraseña = $_POST['contraseña'];

            $usuario_id = $this->usuarioModel->verificarUsuario($nombreUsuario, $contraseña);
            if ($usuario_id) {
                session_start();
                $_SESSION['usuarioID'] = $usuario_id;
                header("Location: ../vista/V_V_Producto/index.html");
                exit();
            } else {
                echo "Error en las credenciales.";
            }
        }
    }
}

$controller = new LoginController();
$controller->login();
?>

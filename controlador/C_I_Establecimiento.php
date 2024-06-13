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

            $usuario_id = $this->usuarioModel->verificarUsuario($nombreUsuario, $contraseña);
            if ($usuario_id) {
                session_start();
                $_SESSION['usuarioID'] = $usuario_id;
                header("Location: ../vista/V_A_Menu/index.php");
                exit();
            } else {
<<<<<<< HEAD
                header("Location: ../vista/V_I_Establecimiento/login.html");
=======
                header("Location: ../vista/V_I_Establecimiento/Empresa.html");
>>>>>>> refs/remotes/origin/facundo
            }
        }
    }
}
$controller = new LoginController();
$controller->login();
?>
<?php
require_once '../modelo/M_R_Cliente.php'; // Asegúrate de que la ruta al archivo del modelo es correcta

class RegistroController {
    private $personaModel;

    public function __construct() {
        $this->personaModel = new PersonaModel();
    }

    public function registrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $nombreUsuario = $_POST['nombreUsuario'];
                $contraseña = $_POST['contraseña'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $genero = $_POST['genero'];
                $fechaNacimiento = $_POST['fechaNacimiento'];

                // Cifrar la contraseña
                $contraseñaCifrada = password_hash($contraseña, PASSWORD_DEFAULT);

                $resultado = $this->personaModel->registrarCliente($nombreUsuario, $contraseñaCifrada, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento);

                if ($resultado) {
                    header("Location: ../Vista/V_I_Sesion/login.php");
                    exit();
                } else {
                    echo "Error al registrar el cliente.";
                }
            } catch (Exception $e) {
                echo "Error al registrar el cliente: " . $e->getMessage();
            }
        } else {
            echo "Solicitud inválida.";
        }
    }
}

$controller = new RegistroController();
$controller->registrar();
?>

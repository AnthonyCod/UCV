<?php
require_once '../modelo/M_R_Cliente.php';  // Asegúrate de que la ruta al archivo del modelo es correcta

class RegistroController {
    private $personaModel;

    public function __construct() {
        $this->personaModel = new PersonaModel();
    }

    public function registrar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                // Recolectar y sanitizar los datos del formulario
                $nombreUsuario = $_POST['nombreUsuario'];
                $contraseña = $_POST['contraseña'];  
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $genero = $_POST['genero'];
                $fechaNacimiento = $_POST['fechaNacimiento'];

                // Usar el ID del usuario para insertar el cliente
                $resultado = $this->personaModel->registrarCliente($nombreUsuario, $contraseña, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento);

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

// Crear una instancia del controlador y llamar al método registrar
$controller = new RegistroController();
$controller->registrar();

?>
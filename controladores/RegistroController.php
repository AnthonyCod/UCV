<?php
require_once '../modelos/PersonaModel.php';  // Asegúrate de que la ruta al archivo del modelo es correcta

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
                $contraseña = $_POST['contraseña'];  // La contraseña será hasheada en el modelo
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $genero = $_POST['genero'];
                $fechaNacimiento = $_POST['fechaNacimiento'];

                // Insertar el usuario y obtener el ID
                $usuario_id = $this->personaModel->insertarUsuario($nombreUsuario, $contraseña);
                
                // Usar el ID del usuario para insertar el cliente
                $this->personaModel->insertarCliente($usuario_id, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento);

                header("Location: ../Vista/V_I_Sesion/login.html");
                exit();
            } catch (Exception $e) {
                echo $e->getMessage();
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

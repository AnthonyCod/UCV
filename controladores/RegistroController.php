<?php
require_once '../modelos/PersonaModel.php';  // Asume que PersonaModel incluye las funciones para interactuar con la base de datos

class RegistroController {
    private $modelo;

    public function __construct() {
        $this->modelo = new PersonaModel();
    }

    public function registrar() {
        // Recolectar datos del formulario
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $genero = $_POST['genero'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $nombreUsuario = $_POST['nombreUsuario'];
        $contraseña = $_POST['contraseña'];

        // Validar datos aquí (ejemplo simple de validación)
        if (empty($dni) || empty($nombre) || empty($correo)) {
            return "Por favor, asegúrese de llenar todos los campos obligatorios.";
        }

        // Hashear la contraseña antes de enviarla al modelo
        $contraseñaHasheada = password_hash($contraseña, PASSWORD_DEFAULT);

        // Llamar al modelo para guardar los datos
        $resultado = $this->modelo->agregarPersona($dni, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $nombreUsuario, $contraseñaHasheada);

        if ($resultado) {
            echo "Registro completado con éxito.";
        } else {
            echo "Error al registrar los datos.";
        }
    }
}

// Crear una instancia del controlador y llamar al método registrar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controlador = new RegistroController();
    $controlador->registrar();
}
?>

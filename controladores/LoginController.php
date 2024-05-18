<?php
require '../modelos/conexion.php'; // Asegúrate de que la ruta al archivo es correcta

$db = new Database();
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['correo'], $_POST['contrasena'])) {
    $user = $_POST['correo'];
    $pass = $_POST['contrasena'];

    // Preparar y ejecutar consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo=? AND contrasena=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Credenciales correctas, redireccionar a otra página
        header("Location: ../vista/Usuario/index.html"); // Asegúrate de cambiar la ruta según sea necesario
        exit();
    } else {
        // Credenciales incorrectas
        echo "Usuario o contraseña incorrectos.";
    }

    $stmt->close();
    $conn->close();
} else {
    // Formulario no enviado o campos faltantes
    echo "Por favor, envía todos los campos requeridos.";
}
?>

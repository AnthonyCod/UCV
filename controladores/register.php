<?php
require_once '../modelos/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = new Usuario();

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $genero = $_POST['genero'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $contrasena = $_POST['contraseña'];

    $resultado = $usuario->registerNewUser($dni, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $contrasena);

    if ($resultado) {
        echo "Registro exitoso.";
        // Redirigir al usuario a la página de inicio de sesión o página principal
        header("Location: ../vista/V_I_Sesion/login.html");
    } else {
        echo "Error en el registro.";
    }
}

?>

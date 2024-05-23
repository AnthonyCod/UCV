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
    $codEstudiante = $_POST['codEstudiante'];
    $repartidor = $_POST['repartidor'];
    $nombreUsuario = $_POST['nombreUsuario'];
    $estado = $_POST['estado'];

    $resultado = $usuario->registerNewUser($dni, $nombreUsuario, $contrasena, $estado, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $codEstudiante, $repartidor);

    if ($resultado) {
        echo "Registro exitoso.";
        header("Location: ../vista/V_I_Sesion/login.html");
    } else {
        echo "Error en el registro.";
    }
}
?>

<?php
session_start();
require '../modelos/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombreUsuario'], $_POST['contrasena'])) {
    $usuarioModel = new Usuario();
    $nombreUsuario = $_POST['nombreUsuario'];
    $contrasena = $_POST['contrasena'];

    $usuarioInfo = $usuarioModel->findUserByNombreUsuarioAndPassword($nombreUsuario, $contrasena);
    if ($usuarioInfo) {
        $_SESSION['usuarioID'] = $usuarioInfo['usuarioID'];
        $_SESSION['nombreUsuario'] = $usuarioInfo['nombreUsuario'];

        header("Location: ../vista/V_V_Producto/index.html");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
} else {
    echo "Por favor, envía todos los campos requeridos.";
}
?>

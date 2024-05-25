<?php
require_once 'm_conexion.php';

class UsuarioModel {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function verificarUsuario($nombreUsuario, $contraseña) {
        $stmt = $this->conexion->prepare("SELECT usuarioID, contraseña FROM usuario WHERE nombreUsuario = ?");
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($usuario = $result->fetch_assoc()) {
            if (password_verify($contraseña, $usuario['contraseña'])) {
                return $usuario['usuarioID'];  // Retorna el ID del usuario si la contraseña es correcta
            }
        }
        return null;  // Retorna null si la autenticación falla
    }
}
?>
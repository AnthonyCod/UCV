<?php
require_once 'conexion.php';

class UsuarioModel {
    private $conn;

    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function verificarUsuario($nombreUsuario, $contraseña) {
        $stmt = $this->conn->prepare("SELECT usuario_id, contraseña FROM usuario WHERE nombreUsuario = ?");
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($usuario = $result->fetch_assoc()) {
            if (password_verify($contraseña, $usuario['contraseña'])) {
                return $usuario['usuario_id'];  // Retorna el ID del usuario si la contraseña es correcta
            }
        }
        return null;  // Retorna null si la autenticación falla
    }
}
?>

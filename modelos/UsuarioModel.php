<?php
require_once 'conexion.php'; // Asume que este archivo contiene la conexión a la base de datos

class UsuarioModel {
    public function verificarUsuario($nombreUsuario, $contraseña) {
        global $conn;

        // Prepara la consulta SQL para buscar el usuario
        $stmt = $conn->prepare("SELECT nombreUsuario, contraseña FROM personas WHERE nombreUsuario = ?");
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($usuario = $result->fetch_assoc()) {
            // Verificar la contraseña hasheada
            if (password_verify($contraseña, $usuario['contraseña'])) {
                return $usuario; // Retorna el usuario si la contraseña coincide
            }
        }
        return null; // Retorna null si no hay coincidencia
    }
}

?>

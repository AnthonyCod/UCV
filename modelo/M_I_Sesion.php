<?php
require_once 'm_conexion.php';

class UsuarioModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function verificarUsuario($nombreUsuario, $contraseña)
    {
        $stmt = $this->conexion->prepare("call c_usuario(?,?);");
        $stmt->bind_param("ss", $nombreUsuario, $contraseña);
        $stmt->execute();
        $result = $stmt->get_result();
        // Verificar si hay un resultado y obtenerlo
        if ($result && $usuario = $result->fetch_assoc()) {
            // La variable $usuario ahora contiene un array asociativo con las columnas 'usuarioID' y 'mensaje'
            if ($usuario['usuarioID'] !== null) {
                // Retorna el ID del usuario si la autenticación es correcta
                return [
                    'usuarioID' => $usuario['usuarioID']
                ];
            } else {
                // Retorna el mensaje de error si la autenticación falla

                echo "usuario o contraseña incorrecta";
                return null;
            }
        }
        return null;  // Retorna null si ocurre algún error inesperado
    }
}

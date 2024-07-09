<?php
require_once 'm_conexion.php';

class UsuarioModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function verificarUsuario($nombreUsuario, $contraseña) {
        $stmt = $this->conexion->prepare("SELECT u.usuarioID, c.clienteID FROM usuario u INNER JOIN cliente c ON u.usuarioID = c.usuarioID WHERE u.nombreUsuario = ? AND u.contraseña = SHA2(?, 256)");
        $stmt->bind_param("ss", $nombreUsuario, $contraseña);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $data = $result->fetch_assoc()) {
            if ($data['usuarioID']) {
                // Retorna ambos ID si la autenticación es correcta
                return $data; // Este será un array con 'usuarioID' y 'clienteID'
            }
        }
        return null;  // Retorna null si no hay resultados o si ocurre un error
    }
    
}

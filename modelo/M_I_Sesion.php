<?php
require_once 'm_conexion.php';

class UsuarioModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = $GLOBALS['conexion'];
    }

<<<<<<< HEAD
    public function obtenerUsuarioPorNombre($nombreUsuario) {
        $stmt = $this->conexion->prepare("CALL verificar_usuario(?, @p_usuarioID, @p_clienteID, @p_contraseña)");
        $stmt->bind_param("s", $nombreUsuario);
=======
    public function verificarUsuario($nombreUsuario, $contraseña) {
        $contraseñaHasheada = hash('sha256', $contraseña);
        $stmt = $this->conexion->prepare("SELECT u.usuarioID, c.clienteID FROM usuario u INNER JOIN cliente c ON u.usuarioID = c.usuarioID WHERE u.nombreUsuario = ? AND u.contraseña = ?");
        $stmt->bind_param("ss", $nombreUsuario, $contraseñaHasheada);
>>>>>>> 080e3bb41708978f5cee925a9b3ba1baeea1328a
        $stmt->execute();

        // Obtener los resultados de las variables de salida
        $result = $this->conexion->query("SELECT @p_usuarioID AS usuarioID, @p_clienteID AS clienteID, @p_contraseña AS contraseña");
        if ($result && $data = $result->fetch_assoc()) {
            return $data; 
        }
        return null;  
    }
}
?>

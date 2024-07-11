<?php
require_once 'm_conexion.php';

class UsuarioModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function obtenerUsuarioPorNombre($nombreUsuario) {
        $stmt = $this->conexion->prepare("CALL verificar_usuario(?, @p_usuarioID, @p_clienteID, @p_contraseña)");
        $stmt->bind_param("s", $nombreUsuario);
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
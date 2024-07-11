<?php
require_once 'm_conexion.php';

class UsuarioModel {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function verificarUsuario($nombreUsuario, $contraseña) {
        // Preparar la llamada al procedimiento almacenado
        $stmt = $this->conexion->prepare("CALL verificar_usuario_empresa(?, @p_usuarioID, @p_contraseña)");
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();

        // Obtener los resultados de las variables de salida
        $result = $this->conexion->query("SELECT @p_usuarioID AS usuarioID, @p_contraseña AS contraseña");
        if ($result && $data = $result->fetch_assoc()) {
            // Devolver el array con usuarioID y contraseña para la verificación en el controlador
            return $data;
        }
        return null;
    }
}
?>

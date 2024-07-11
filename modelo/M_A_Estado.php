<?php
require_once 'm_conexion.php'; 

class EstadoModelo {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function consultarEstado($pedidoID) {
        $stmt = $this->conexion->prepare("CALL c_estadoPedido(?)");
        $stmt->bind_param("i", $pedidoID);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            return $resultado->fetch_assoc(); 
        } else {
            throw new Exception("Error al consultar pedido: " . $stmt->error);
        }
    }
}
?>
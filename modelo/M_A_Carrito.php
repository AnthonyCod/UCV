<?php
require_once("m_conexion.php");

class Carrito {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
        // Asegurarse de que la conexión se ha establecido correctamente
        if (!$this->conexion) {
            error_log("Error al conectar a la base de datos: " . mysqli_connect_error());
            throw new Exception("Error al conectar a la base de datos: " . mysqli_connect_error());
        }
    }

    public function insertarPedidoConDetalles($pagoID, $estado, $fechaEntrega, $evidencia, $calificacion, $fechaEnvio, $ubicacion, $metodoEntrega, $detalles) {
        $consulta = "CALL insertarPedidoConDetalles(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);

        if (!$stmt) {
            error_log("Error al preparar la consulta: " . $this->conexion->error);
            throw new Exception("Error al preparar la consulta: " . $this->conexion->error);
        }

        // Agregar registros de depuración
        error_log("Parámetros de la consulta: pagoID=$pagoID, estado=$estado, fechaEntrega=$fechaEntrega, evidencia=$evidencia, calificacion=$calificacion, fechaEnvio=$fechaEnvio, ubicacion=$ubicacion, metodoEntrega=$metodoEntrega, detalles=$detalles");

        $stmt->bind_param(
            'isssissss', 
            $pagoID, 
            $estado, 
            $fechaEntrega, 
            $evidencia, 
            $calificacion, 
            $fechaEnvio, 
            $ubicacion, 
            $metodoEntrega, 
            $detalles
        );

        if (!$stmt->execute()) {
            error_log("Error al ejecutar la consulta: " . $stmt->error);
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }

        // Capturar y registrar el resultado de la consulta
        $resultado = $stmt->get_result();
        if ($resultado) {
            while ($row = $resultado->fetch_assoc()) {
                error_log("Resultado de la consulta: " . print_r($row, true));
            }
        }

        error_log("Consulta ejecutada correctamente");

        $stmt->close();
        $this->conexion->close();
    }
}
?>



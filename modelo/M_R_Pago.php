<?php
class PagoModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function guardarPago($fechaPago, $montoTotal) {
        $tipoPagoID = 1; // Tipo de pago siempre es 1
        $query = "INSERT INTO pago (tipoPagoID, fechaPago, montoTotal) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("isd", $tipoPagoID, $fechaPago, $montoTotal);
        return $stmt->execute();
    }
}
?>

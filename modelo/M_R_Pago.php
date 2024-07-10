<?php
class PagoModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function guardarPago($tipoPagoID,$fechaPago, $montoTotal) {
        
        $query = "CALL i_pago(?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("isd", $tipoPagoID, $fechaPago, $montoTotal);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $pago = $result->fetch_assoc();
            return $pago['pagoID'];
        } else {
            return false;
        }
    }
}
?>

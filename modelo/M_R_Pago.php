<?php
class PagoModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

<<<<<<< HEAD
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
=======
    public function guardarPago($fechaPago, $montoTotal) {
        $tipoPagoID = 1; // Tipo de pago siempre es 1
        $query = "call i_pago(?,?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("isd", $tipoPagoID, $fechaPago, $montoTotal);
        return $stmt->execute();
>>>>>>> b6f422b (falta carrito para adelante)
    }
}
?>

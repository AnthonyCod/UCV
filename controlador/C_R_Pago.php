<?php
require '../modelo/m_conexion.php'; // Archivo donde configuras la conexión a tu base de datos
require '../modelo/M_R_Pago.php';

$pagoModel = new PagoModel($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
<<<<<<< HEAD
    $tipoPagoID = 1; // Tipo de pago siempre es 1
=======
>>>>>>> facundo
    $fechaPago = date("Y-m-d"); // Obtener la fecha actual
    $montoTotal = 12; // Monto total fijo

    // Guardar el pago con tipoPagoID siempre 1
<<<<<<< HEAD
    $pagoID = $pagoModel->guardarPago($tipoPagoID, $fechaPago, $montoTotal);

    if ($pagoID) {
        echo json_encode(["success" => true, "pagoID" => $pagoID]);
    } else {
        echo json_encode(["success" => false, "error" => "Error al procesar el pago."]);
=======
    $resultado = $pagoModel->guardarPago($fechaPago, $montoTotal);

    if ($resultado) {
        echo "Pago procesado exitosamente.";
    } else {
        echo "Error al procesar el pago.";
>>>>>>> facundo
    }
}
?>

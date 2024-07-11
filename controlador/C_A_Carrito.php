<?php

require_once("../modelo/M_A_Carrito.php");

header('Content-Type: application/json');

$response = array("success" => false);

try {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!$data) {
        throw new Exception("No se recibieron datos.");
    }

    // Registrar datos recibidos para depuración
    error_log("Datos recibidos: " . print_r($data, true));

    $carritoModelo = new Carrito();

    // Verificar que detalles es un array y codificarlo como JSON
    if (!is_array($data['detalles'])) {
        throw new Exception("Detalles no es un array.");
    }
    $detalles_json = json_encode($data['detalles']);

    // Llamar al método del modelo y capturar posibles excepciones
    $carritoModelo->insertarPedidoConDetalles(
        $data['pagoID'], 
        $data['estado'], 
        $data['fechaEntrega'], 
        $data['evidencia'], 
        $data['calificacion'], 
        $data['fechaEnvio'], 
        $data['ubicacion'], 
        $data['metodoEntrega'], 
        $data['clienteID'],
        $detalles_json
    );

    $response["success"] = true;
    $response["params"] = array(
        "pagoID" => $data['pagoID'],
        "estado" => $data['estado'],
        "fechaEntrega" => $data['fechaEntrega'],
        "evidencia" => $data['evidencia'],
        "calificacion" => $data['calificacion'],
        "fechaEnvio" => $data['fechaEnvio'],
        "ubicacion" => $data['ubicacion'],
        "metodoEntrega" => $data['metodoEntrega'],
        "clienteID"=> $data['clienteID'],
        "detalles" => $detalles_json
    );

} catch (Exception $e) {
    $response["error"] = $e->getMessage();
    echo("Error al procesar el pedido: " . $e->getMessage());
}

echo json_encode($response);
?>

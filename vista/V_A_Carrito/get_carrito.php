<?php
include 'm_conexion.php'; // Asume que tu archivo de conexión se llama m_conexion.php

// Suponiendo que obtienes el ID del cliente de alguna manera (sesión, token, etc.)
$clienteID = $_SESSION['cliente_id']; // Asegúrate de tener una sesión iniciada

$conn = new Conexion();
$conexion = $conn->conectar();

// Preparar la consulta para obtener los detalles del carrito
$query = "SELECT dc.productoID, p.nombre, p.precio, dc.cantidad, (dc.cantidad * p.precio) AS importe
          FROM detallecarrito dc
          JOIN productos p ON dc.productoID = p.productoID
          JOIN carrito c ON dc.carritoID = c.carritoID
          WHERE c.clienteID = ? AND c.estado = 'Activo'";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $clienteID);
$stmt->execute();
$result = $stmt->get_result();
$carrito = [];
while ($row = $result->fetch_assoc()) {
    $carrito[] = $row;
}
$stmt->close();
$conexion->close();

// Envía los datos en formato JSON
echo json_encode($carrito);
?>

<?php
require_once '../modelo/m_conexion.php';

session_start();
if (!isset($_SESSION['clienteID'])) {
    echo "No estás logueado.";
    exit();
}

$clienteID = $_SESSION['clienteID'];
$isRepartidor = isset($_POST['repartidor']) ? intval($_POST['repartidor']) : 0;

// Llama a la función conectar con las variables de conexión
$conexion = conectar($servidor, $user, $pass, $database);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "UPDATE cliente SET repartidor = ? WHERE clienteID = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $isRepartidor, $clienteID);

if ($stmt->execute()) {
    echo "Estado de repartidor actualizado correctamente.";
} else {
    echo "Error al actualizar el estado de repartidor: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>

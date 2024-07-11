<?php
session_start();
require_once 'm_conexion.php'; // Ajusta la ruta según tu estructura de directorios

$conexion = conectar($servidor, $user, $pass, $database);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$isRepartidor = false;

if (isset($_SESSION['clienteID'])) {
    $clienteID = $_SESSION['clienteID'];
    $stmt = $conexion->prepare("SELECT repartidor FROM cliente WHERE clienteID = ?");
    $stmt->bind_param("i", $clienteID);
    $stmt->execute();
    $stmt->bind_result($repartidor);
    $stmt->fetch();
    $isRepartidor = ($repartidor == 1);
    $stmt->close();
}

$conexion->close();
?>

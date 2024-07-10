<?php
include '../../modelo/m_conexion.php';

// Llama a la función conectar con las variables de conexión
$conexion = conectar($servidor, $user, $pass, $database);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_GET['pedidoID'])) {
    $pedidoID = $_GET['pedidoID'];

    // Actualizar el estado del pedido a 'rechazado'
    $sql = "UPDATE pedido SET estado = 'rechazado' WHERE pedidoID = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $stmt->bind_param("i", $pedidoID);

    if ($stmt->execute()) {
        echo "Pedido rechazado correctamente.";
    } else {
        echo "Error al rechazar el pedido: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No se proporcionó un ID de pedido.";
}

$conexion->close();
?>

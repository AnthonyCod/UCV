<?php
include '../../modelo/m_conexion.php';

// Llama a la función conectar con las variables de conexión
$conexion = conectar($servidor, $user, $pass, $database);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_GET['pedidoID'])) {
    $pedidoID = $_GET['pedidoID'];

    // Eliminar el pedido de la tabla 'detalle' primero debido a la relación de clave foránea
    $sqlDetalle = "DELETE FROM detalle WHERE pedidoID = ?";
    $stmtDetalle = $conexion->prepare($sqlDetalle);

    if ($stmtDetalle === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $stmtDetalle->bind_param("i", $pedidoID);

    if (!$stmtDetalle->execute()) {
        echo "Error al eliminar el detalle del pedido: " . $stmtDetalle->error;
        $stmtDetalle->close();
        $conexion->close();
        exit;
    }

    $stmtDetalle->close();

    // Luego eliminar el pedido de la tabla 'pedido'
    $sqlPedido = "DELETE FROM pedido WHERE pedidoID = ?";
    $stmtPedido = $conexion->prepare($sqlPedido);

    if ($stmtPedido === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    $stmtPedido->bind_param("i", $pedidoID);

    if ($stmtPedido->execute()) {
        echo "Pedido eliminado correctamente.";
    } else {
        echo "Error al eliminar el pedido: " . $stmtPedido->error;
    }

    $stmtPedido->close();
} else {
    echo "No se proporcionó un ID de pedido.";
}

$conexion->close();
?>

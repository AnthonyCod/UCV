<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pedidos.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Lista de Pedidos</title>
</head>
<body>
     <!--============== HEADER ==============-->
    <header>
        <div class="icon">
            <span class="fa fa-bars" id="bars"></span>
            <span>UCV FOOD</span>
                <img src="../images/iconoPrincipal.png">
        </div>
    </header>
    <div class="content">
    <?php
    include '../../modelo/m_conexion.php';

    // Llama a la función conectar con las variables de conexión
    $conexion = conectar($servidor, $user, $pass, $database);

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Consulta para obtener los detalles del pedido
    $sql = "
        SELECT 
            p.pedidoID, 
            p.estado, 
            p.fechaEntrega, 
            p.ubicacion, 
            p.metodoEntrega, 
            p.clienteID, 
            c.nombre AS nombreCliente, 
            d.productoID, 
            pr.nombreProducto, 
            d.cantidad, 
            pr.precio, 
            d.importe
        FROM 
            pedido p
        JOIN 
            cliente c ON p.clienteID = c.clienteID
        JOIN 
            detalle d ON p.pedidoID = d.pedidoID
        JOIN 
            producto pr ON d.productoID = pr.productoID
        WHERE 
            p.estado != 'rechazado'
        ORDER BY 
            p.pedidoID ASC
    ";

    $result = $conexion->query($sql);

    $pedidos = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $pedidoID = $row["pedidoID"];
            if (!isset($pedidos[$pedidoID])) {
                $pedidos[$pedidoID] = [
                    'estado' => $row["estado"],
                    'fechaEntrega' => $row["fechaEntrega"],
                    'ubicacion' => $row["ubicacion"],
                    'metodoEntrega' => $row["metodoEntrega"],
                    'clienteID' => $row["clienteID"],
                    'nombreCliente' => $row["nombreCliente"],
                    'productos' => []
                ];
            }
            $pedidos[$pedidoID]['productos'][] = $row;
        }

        foreach($pedidos as $pedidoID => $detalle) {
            echo '<div class="container" id="pedido_container">';
            echo '<h2> Pedido ' . $pedidoID . ' </h2>';
            echo '<div class="pedido">';
            echo '<h3> Estado: ' . $detalle['estado'] . ' </h3>';
            echo '<h3> Fecha de Entrega: ' . $detalle['fechaEntrega'] . ' </h3>';
            echo '<h3> Ubicación: ' . $detalle['ubicacion'] . ' </h3>';
            echo '<h3> Método de Entrega: ' . $detalle['metodoEntrega'] . ' </h3>';
            echo '<h3> Cliente: ' . $detalle['nombreCliente'] . ' </h3>';
            $montoTotal = array_sum(array_column($detalle['productos'], 'importe'));
            echo '<h3> Monto Total: s/. ' . $montoTotal . ' </h3>';
            echo '<ol>';
            foreach($detalle['productos'] as $producto) {
                echo '<li>';
                echo '<p>Producto: ' . $producto["nombreProducto"] . '</p>';
                echo '<p>Cantidad: ' . $producto["cantidad"] . '</p>';
                echo '<p>Precio: s/.'.$producto["precio"] .'</p>';
                echo '<p>Importe: s/. ' . $producto["importe"] . '</p>';
                echo '</li>';
            }
            echo '</ol>';
            echo '</div>';
            echo '<button onclick="aceptarPedido(' . $pedidoID . ')">Proceso</button>';
            echo '<button onclick="rechazarPedido(' . $pedidoID . ')">Entregado</button>';
            echo '</div>';
        }
    } else {
        echo "No hay pedidos disponibles.";
    }
    $conexion->close();
    ?>
    </div>
    <footer>
        <div class="final">
            <a href="../V_V_Producto/index.php" class="boton-volver">Volver al catalogo</a>
        </div>
    </footer>

    <script>
    function aceptarPedido(pedidoID) {
        // Implementación para aceptar el pedido
    }

    /*function rechazarPedido(pedidoID) {
    if (confirm("¿Estás seguro de que deseas rechazar este pedido?")) {
        fetch(`rechazar_pedido.php?pedidoID=${pedidoID}`)
        .then(response => response.text())
        .then(data => {
            alert(data);
            window.location.reload();
        })
        .catch(error => {
            console.error("Error al rechazar el pedido:", error);
        });
    }
}*/

    </script>
</body>
</html>

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
    include '../Modelo/conexion.php';

    // Consulta para llamar al stored procedure
    $sql = "CALL ObtenerDetalleCarrito()";
    $result = $conexion->query($sql);

    $pedidos = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $carritoID = $row["carritoID"];
            if (!isset($pedidos[$carritoID])) {
                $pedidos[$carritoID] = [
                    'nombreCliente' => $row["nombreCliente"], // Guardar el nombre del cliente
                    'productos' => [] // Inicializar el array de productos
                ];
            }
            $pedidos[$carritoID]['productos'][] = $row;
        }

        foreach($pedidos as $carritoID => $detalle) {
            echo '<div class="container" id="pedido_containe">';
            echo '<h2> Pedido ' . $carritoID . ' </h2>';
            echo '<div class="pedido">';
            echo '<h3> Cliente: ' . $detalle['nombreCliente'] . ' </h3>';  // Mostrar el nombre del cliente
            echo '<ol>'; // Inicia la lista ordenada
            foreach($detalle['productos'] as $producto) {
                echo '<li>'; // Cada producto como un ítem de la lista
                echo '<p>Producto: ' . $producto["nombreProducto"] . '</p>';
                echo '<p>Cantidad: ' . $producto["cantidad"] . '</p>';
                echo '<p>Precio: s/.'.$producto["importe"] .'</p>';
                echo '<p>Importe: s/. ' . $producto["importe"]* $producto["cantidad"] .'.00'. '</p>';
                echo '</li>'; // Cierra el ítem de la lista
            }
            echo '</ol>'; // Cierra la lista ordenada
            echo '</div>';
            echo '<button onclick="aceptarPedido(' . $carritoID . ')">Aceptar</button>';
            echo '</div>';
        }
    } else {
        echo "No hay pedidos disponibles.";
    }
    $conexion->close();
    ?>
    </div>

    <!--============== FOOTER ==============-->
    <footer>
        <div class="final">
        </div>
    </footer> 
</body>
</html>
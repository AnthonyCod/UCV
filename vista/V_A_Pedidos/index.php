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

        $conexion = conectar($servidor, $user, $pass, $database);

        if (!$conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        // Actualizamos la consulta para reflejar los campos existentes
        $sql = "SELECT p.pedidoID, p.estado, p.fechaEntrega, p.ubicacion, p.metodoEntrega, d.cantidad, d.importe, pr.nombreProducto 
                FROM pedido p 
                INNER JOIN detalle d ON p.pedidoID = d.pedidoID 
                INNER JOIN producto pr ON d.productoID = pr.productoID 
                ORDER BY p.pedidoID ASC";
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
                        'productos' => []
                    ];
                }
                $pedidos[$pedidoID]['productos'][] = $row;
            }

            foreach($pedidos as $pedidoID => $detalle) {
                echo '<div class="container" id="pedido_container">';
                echo '<h2> Pedido ' . $pedidoID . ' </h2>';
                echo '<div class="pedido">';
                echo '<p>Estado: ' . $detalle['estado'] . '</p>';
                echo '<p>Fecha de Entrega: ' . $detalle['fechaEntrega'] . '</p>';
                echo '<p>Ubicación: ' . $detalle['ubicacion'] . '</p>';
                echo '<p>Método de Entrega: ' . $detalle['metodoEntrega'] . '</p>';
                echo '<p>Monto Total: $' . array_reduce($detalle['productos'], function($carry, $producto) {
                    return $carry + ($producto['importe'] * $producto['cantidad']);
                }, 0) . '</p>';
                echo '<ol>';
                foreach($detalle['productos'] as $producto) {
                    echo '<li>';
                    echo '<p>Producto: ' . $producto["nombreProducto"] . '</p>';
                    echo '<p>Cantidad: ' . $producto["cantidad"] . '</p>';
                    echo '<p>Precio: $' . $producto["importe"] . '</p>';
                    echo '<p>Importe: $' . ($producto["importe"] * $producto["cantidad"]) . '</p>';
                    echo '</li>';
                }
                echo '</ol>';
                echo '</div>';
                echo '<button class="aceptar" data-pedido-id="' . $pedidoID . '">Aceptar</button>';
                echo '<button class="rechazar" data-pedido-id="' . $pedidoID . '">Rechazar</button>';
                echo '</div>';
            }
        } else {
            echo "No hay pedidos disponibles.";
        }
        $conexion->close();
        ?>
    </div>

    <div class="volver"> 
        <button onclick="window.location.href='../V_A_Menu/index.php'">Volver al índice de la empresa</button> 
    
    </div>
    
    <footer>
        <div class="final">
            <a href="../V_A_Empresa/index.php" class="boton-volver">Volver al índice de la empresa</a>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.rechazar').forEach(button => {
                button.addEventListener('click', function() {
                    const pedidoID = this.getAttribute('data-pedido-id');
                    if (confirm('¿Estás seguro de que deseas rechazar este pedido?')) {
                        fetch(`../../controlador/C_A_Carrito.php?accion=eliminar&pedidoID=${pedidoID}`, {
                            method: 'GET'
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Pedido rechazado correctamente.');
                                location.reload();
                            } else {
                                alert('Error al rechazar el pedido: ' + data.error);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                });
            });
        });
    </script>
</body>
</html>

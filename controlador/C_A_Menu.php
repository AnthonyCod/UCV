<?php
include("../modelo/m_conexion.php");
include("../modelo/M_A_Menu.php");

if (isset($_POST['saveProduct'])) {
    $producto = new Producto($conexion);

    $nombre = trim($_POST['productName']);
    $descripcion = trim($_POST['productDescription']);
    $precio = trim($_POST['productPrice']);
    $descripcionCategoria = trim($_POST['productList']);

    // Intentar guardar el producto en la base de datos
    try {
        if ($producto->guardarProducto($nombre, $descripcion, $precio, $descripcionCategoria)) {
            echo "Producto insertado correctamente.";
        } else {
            echo "Error al insertar el producto.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


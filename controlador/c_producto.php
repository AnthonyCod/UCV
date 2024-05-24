
<?php
include("../m_conexion.php");
include("../modelo/m_producto.php");

if(isset($_POST['saveProduct'])){
    
    $producto = new Producto($conexion);

    //Obtener los datos

    $categoriaId = $producto->obtenerCategoriaId(trim($_POST['productList']));
    $ruc = $producto->obtenerRUC();
    $nombre = trim($_POST['productName']);
    $descripcion = trim($_POST['productDescription']);
    $precio = trim($_POST['productPrice']);

    if ($categoriaId && $ruc) {
        // Intentar guardar el producto en la base de datos
        if ($productoModel->guardarProducto($categoriaId, $ruc, $nombre, $descripcion, $precio)) {
            // Éxito
            echo "Producto insertado correctamente.";
        } else {
            // Error al guardar el producto
            echo "Error al insertar el producto.";
        }
    } else {
        // Error al obtener la categoría o el RUC
        echo "Error al obtener la categoría o el RUC.";
    }
}
    





?>
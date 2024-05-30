<?php
include("../modelo/m_conexion.php");
include("../modelo/M_A_Menu.php");

// Encabezado para JSON
header('Content-Type: application/json');

$response = array("success" => false, "product" => null);

// Procesar solicitud POST para guardar un nuevo producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = new Producto($conexion);

    $nombre = trim($_POST['productName']);
    $descripcion = trim($_POST['productDescription']);
    $precio = trim($_POST['productPrice']);
    $descripcionCategoria = trim($_POST['productList']);
    $image = '';

    if (isset($_FILES["productImage"])) {
        $file = $_FILES["productImage"];
        $nombreArchivo = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $dimensiones = getimagesize($ruta_provisional);
        $carpeta = "../fotos/";

        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
            $response['error'] = "El archivo no es una imagen";
        } else if ($size > 5 * 1080 * 1920) { // Asegúrate de que esto es lo que quieres (5MB)
            $response['error'] = "El tamaño máximo permitido es 5MB";
        } else {
            $src = $carpeta . $nombreArchivo;
            if (move_uploaded_file($ruta_provisional, $src)) {
                $image = $src;
            } else {
                $response['error'] = "Error al mover el archivo.";
                echo json_encode($response);
                exit;
            }
        }
    }

    try {
        if ($producto->guardarProducto($nombre, $descripcion, $precio, $image, $descripcionCategoria)) {
            $response["success"] = true;
            $response["product"] = array(
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "foto" => $image
            );
        }
    } catch (Exception $e) {
        $response['error'] = $e->getMessage();
        error_log("Error al guardar el producto en la base de datos: " . $e->getMessage());
    }

    echo json_encode($response);
    exit;
}

// Obtener productos activos si no es una solicitud POST
try {
    $producto = new Producto($conexion);
    $productos = $producto->obtenerProductosActivos();
    echo json_encode($productos);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

mysqli_close($conexion);
?>

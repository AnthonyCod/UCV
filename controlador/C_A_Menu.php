<?php
include("../modelo/m_conexion.php");
include("../modelo/M_A_Menu.php");

// Encabezado para JSON
header('Content-Type: application/json');

$response = array("success" => false, "product" => null);

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
        } else if ($size > 5 * 1080  * 1920) {
            $response['error'] = "El tamaño máximo permitido es 3MB";
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
                "image" => $image
            );
        }
    } catch (Exception $e) {
        $response['error'] = $e->getMessage();
        error_log("Error al guardar el producto en la base de datos");

    }
}

// Enviar la respuesta como JSON
echo json_encode($response);
exit;
?>

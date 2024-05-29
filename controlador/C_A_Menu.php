<?php
include("../modelo/m_conexion.php");
include("../modelo/M_A_Menu.php");

if (isset($_POST['saveProduct'])) {
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
        $carpeta = "../vista/fotos/";

        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
            echo json_encode(["success" => false, "error" => "El archivo no es una imagen"]);
            exit;
        } else if ($size > 3 * 1024 * 1024) {
           echo json_encode(["success" => false, "error" => "El tamaño máximo permitido es 3MB"]);
           exit;
        } else {
            $src = $carpeta . $nombreArchivo;
            if (move_uploaded_file($ruta_provisional, $src)) {
                $image = $src;
            } else {
               echo json_encode(["success" => false, "error" => "Error al mover el archivo."]);
                exit;
            }
        }
    }

    try {
        if ($producto->guardarProducto($nombre, $descripcion, $precio, $image, $descripcionCategoria)) {
            header("Location: ../vista/V_A_Menu/index.php?success=1");
            exit;
        } 
    } catch (Exception $e) {
    }
}
?>

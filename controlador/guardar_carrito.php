<?php
header('Content-Type: application/json');

try {
    // Obtener los datos enviados
    $producto = json_decode(file_get_contents('php://input'), true);

    // Verificar si se recibieron los datos correctamente
    if (!$producto) {
        throw new Exception('No se recibieron datos o los datos no son válidos.');
    }

    // Ruta al archivo carrito.json
    $file = __DIR__ . '/carrito.json';

    // Leer el archivo JSON existente o crear uno nuevo si no existe
    if (file_exists($file)) {
        $carrito = json_decode(file_get_contents($file), true);
    } else {
        $carrito = [];
    }

    // Agregar el nuevo producto al carrito
    $carrito[] = $producto;

    // Guardar el carrito actualizado en el archivo JSON
    if (file_put_contents($file, json_encode($carrito, JSON_PRETTY_PRINT)) === false) {
        throw new Exception('No se pudo escribir en el archivo carrito.json.');
    }

    // Enviar respuesta exitosa
    echo json_encode(['status' => 'success', 'message' => 'Producto añadido al carrito']);
} catch (Exception $e) {
    // Enviar respuesta de error
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>

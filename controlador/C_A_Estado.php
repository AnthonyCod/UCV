<?php
header("Content-Type: application/json");

require_once '../modelo/M_A_Estado.php';

class EstadoControlador {
    private $estadoModelo;

    public function __construct($database) {
        $this->estadoModelo = new EstadoModelo($database);
    }

    public function mostrarEstado() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Obtener el contenido de la solicitud POST
                $input = json_decode(file_get_contents('php://input'), true);

                // Verificar y depurar la entrada
                echo "Entrada JSON: " . print_r($input, true) . "\n";

                if (isset($input['pedidoID'])) {
                    $pedidoID = $input['pedidoID'];

                    // Consultar estado del pedido
                    $resultado = $this->estadoModelo->consultarEstado($pedidoID);

                    if ($resultado) {
                        // Registrar la salida
                        echo "Salida JSON: " . json_encode($resultado) . "\n";

                        echo json_encode([
                            "pedidoID" => $resultado['id'],
                            "estado" => $resultado['estado'],
                            "fechaRegistro" => $resultado['fechaRegistro'],
                            "fechaEntrega" => $resultado['fechaEntrega'],
                            "ubicacion" => $resultado['ubicacion']
                        ]);
                    } else {
                        echo json_encode(["error" => "Pedido no encontrado"]);
                    }
                } else {
                    echo json_encode(["error" => "No se proporcionó pedidoID."]);
                }
            } catch (Exception $e) {
                echo json_encode(["error" => "Error al consultar: " . $e->getMessage()]);
            }
        } else {
            echo json_encode(["error" => "Solicitud inválida."]);
        }
    }
}

require_once '../modelo/m_conexion.php'; 
$database = $conexion;  // Asume que $conexion está definido en m_conexion.php
$controlador = new EstadoControlador($database);
$controlador->mostrarEstado();
?>

<?php
require_once '../modelo/M_R_Establecimiento.php'; 

class RegistroController {
    private $empresaModel;

    public function __construct() {
        $this->empresaModel = new EmpresaModel();
    }

    public function registrarEmpresa() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                // Recolectar y sanitizar los datos del formulario
                $nombreUsuario = $_POST['nombreUsuario'];
                $contraseña = $_POST['contraseña'];  
                $RUC = $_POST['RUC'];
                $nombreEmpresa = $_POST['nombreEmpresa'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $correo = $_POST['correo'];

                // Llamar al método del modelo para registrar la empresa
                $usuarioID = $this->empresaModel->registrarEmpresa($nombreUsuario, $contraseña, $RUC, $nombreEmpresa, $telefono, $direccion, $correo);

                if ($usuarioID) {
                    header("Location: ../vista/V_I_Establecimiento/login.php");
                    exit();
                } else {
                    echo "Error al registrar la empresa.";
                }
            } catch (Exception $e) {
                echo "Error al registrar la empresa: " . $e->getMessage();
            }
        } else {
            echo "Solicitud inválida.";
        }
    }
}

$controller = new RegistroController();
$controller->registrarEmpresa();
?>

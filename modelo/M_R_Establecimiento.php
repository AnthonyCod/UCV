<?php
require_once 'm_conexion.php'; 

class EmpresaModel {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function registrarEmpresa($nombreUsuario, $contraseña, $RUC, $nombreEmpresa, $telefono, $direccion, $correo) {

        // Preparar la llamada al procedimiento almacenado
        $stmt = $this->conexion->prepare("CALL i_Establecimiento(?, ?, ?, ?, ?, ?, ?)");

        // Vincular los parámetros al procedimiento almacenado
        $stmt->bind_param("sssssss", $RUC, $nombreEmpresa, $telefono, $direccion, $correo, $nombreUsuario, $contraseña);

         // Realizar la ejecución
         if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al insertar un Establecimiento: " . $stmt->error);
        }
    }
}

?>

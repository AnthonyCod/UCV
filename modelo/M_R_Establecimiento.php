<?php
require_once 'm_conexion.php'; 

class EmpresaModel {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function registrarEmpresa($nombreUsuario, $contraseña, $RUC, $nombreEmpresa, $telefono, $direccion, $correo) {
        // Cifrar la contraseña
        $contraseñaCifrada = password_hash($contraseña, PASSWORD_DEFAULT);

        // Preparar la llamada al procedimiento almacenado
        $stmt = $this->conexion->prepare("CALL i_Establecimiento(?, ?, ?, ?, ?, ?, ?, @p_usuarioID)");

        // Vincular los parámetros al procedimiento almacenado
        $stmt->bind_param("sssssss", $nombreUsuario, $contraseñaCifrada, $RUC, $nombreEmpresa, $telefono, $direccion, $correo);

        // Realizar la ejecución
        if ($stmt->execute()) {
            // Obtener el ID del usuario insertado
            $result = $this->conexion->query("SELECT @p_usuarioID as usuarioID");
            if ($result && $data = $result->fetch_assoc()) {
                return $data['usuarioID'];
            } else {
                throw new Exception("Error al obtener el ID del usuario insertado.");
            }
        } else {
            throw new Exception("Error al insertar un Establecimiento: " . $stmt->error);
        }
    }
}
?>
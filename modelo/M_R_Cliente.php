<?php
require_once 'm_conexion.php'; 

class PersonaModel {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function registrarCliente($nombreUsuario, $contraseña, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento) {
        $fechaRegistro = date('Y-m-d'); // Obtener fecha actual

        $stmt = $this->conexion->prepare("CALL i_Cliente(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $fechaRegistro, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $nombreUsuario, $contraseña);

        if ($stmt->execute()) {
            return true; // Si la ejecución es exitosa
        } else {
            throw new Exception("Error al insertar cliente: " . $stmt->error);
        }
    }
}
?>

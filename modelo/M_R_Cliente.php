<?php
require_once 'm_conexion.php'; 

class PersonaModel {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function registrarCliente($nombreUsuario, $contraseña, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento) {
        // Obtener fecha actual
        $fechaRegistro = date('Y-m-d');

        // Preparar la consulta sql
        $stmt = $this->conexion->prepare("CALL i_Cliente(?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Asignar el tipo de cada dato
        $stmt->bind_param("sssssssss", $fechaRegistro, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $nombreUsuario, $contraseña);

        // Realizar la ejecución
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al insertar cliente: " . $stmt->error);
        }
    }
}

?>
<?php
require_once 'conexion.php'; // Archivo de conexión a la base de datos

class PersonaModel {
    private $conn;

    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function agregarPersona($dni, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $nombreUsuario, $contraseña) {
        $stmt = $this->conn->prepare("INSERT INTO personas (dni, nombre, apellido, telefono, correo, genero, fechaNacimiento, nombreUsuario, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $dni, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $nombreUsuario, $contraseña);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al ejecutar: " . $stmt->error;
            return false;
        }
    }
}

?>

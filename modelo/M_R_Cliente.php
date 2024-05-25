<?php
require_once 'm_conexion.php'; 

class PersonaModel {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function insertarUsuario($nombreUsuario, $contraseña) {
        $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);
        $stmt = $this->conexion->prepare("INSERT INTO usuario (nombreUsuario, contraseña) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombreUsuario, $contraseñaHash);

        if ($stmt->execute()) {
            return $this->conexion->insert_id;
        } else {
            throw new Exception("Error al insertar usuario: " . $stmt->error);
        }
    }

    public function insertarCliente($usuario_id, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento) {
        $fechaRegistro = date('Y-m-d');
        $puntosFidelidad = 0;
        $repartidor = 0;
        $estado = 1;
    
        $stmt = $this->conexion->prepare("INSERT INTO cliente (usuarioID, puntosFidelidad, fechaRegistro, repartidor, estado, nombre, apellido, telefono, correo, genero, fechaNacimiento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // Corrección aquí: especifica correctamente los tipos de cada parámetro
        $stmt->bind_param("iisiissssss", $usuario_id, $puntosFidelidad, $fechaRegistro, $repartidor, $estado, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al insertar cliente: " . $stmt->error);
        }
    }
}
?>
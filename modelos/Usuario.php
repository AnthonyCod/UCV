<?php
require_once 'conexion.php';  // Asegúrate de que la ruta es correcta

class Usuario {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function findUserByCorreoAndPassword($correo, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE correo = ? AND contrasena = ?");
        $stmt->bind_param("ss", $correo, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Método para registrar un nuevo usuario
    public function registerNewUser($dni, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $contrasena) {
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT); // Hashing the password
        $stmt = $this->db->prepare("INSERT INTO persona (dni, nombre, apellido, telefono, correo, genero, fechaNacimiento, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $dni, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $hashed_password);
        
        if ($stmt->execute()) {
            return true; // Registro exitoso
        } else {
            return false; // Error en el registro
        }
    }
}



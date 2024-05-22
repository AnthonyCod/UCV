<?php
require_once 'conexion.php';  // Asegúrate de que la ruta es correcta

class Usuario {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function findUserByCorreoAndPassword($correo, $password) {
        // Preparar y ejecutar consulta
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE correo = ? AND contrasena = ?");
        $stmt->bind_param("ss", $correo, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}


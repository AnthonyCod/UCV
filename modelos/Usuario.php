<?php
include 'conexion.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function findUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE correo = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

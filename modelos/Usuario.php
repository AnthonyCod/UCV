<?php
require_once 'conexion.php';  

class Usuario {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function findUserByNombreUsuarioAndPassword($nombreUsuario, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE nombreUsuario = ? LIMIT 1");
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
        if ($user && password_verify($password, $user['contraseña'])) {
            return $user;  
        } else {
            return false;
        }
    }
    
    public function registerNewUser($dni, $nombreUsuario, $contrasena, $estado, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $codEstudiante, $repartidor) {
        $this->db->begin_transaction();
        try {
            // Insertar usuario
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO usuario (nombreUsuario, contraseña, estado) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $nombreUsuario, $hashed_password, $estado);
            $stmt->execute();
            $usuarioID = $this->db->insert_id;

            // Insertar persona
            $stmt = $this->db->prepare("INSERT INTO persona (dni, nombre, apellido, telefono, correo, genero, fechaNacimiento, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $dni, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $hashed_password);
            $stmt->execute();

            // Insertar cliente
            $fechaRegistro = date("Y-m-d"); 
            $stmt = $this->db->prepare("INSERT INTO cliente (cod_Estudiante, dni, usuarioID, fechaRegistro, repartidor) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisi", $codEstudiante, $dni, $usuarioID, $fechaRegistro, $repartidor);
            $stmt->execute();

            $this->db->commit();
            return true;  
        } catch (Exception $e) {
            $this->db->rollback();
            return 'Error en el registro: ' . $e->getMessage();
        }
    }
}
?>

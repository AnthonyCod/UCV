<?php
require_once 'm_conexion.php';

class PersonaModel {
    private $conexion;

    public function __construct() {
        $this->conexion = $GLOBALS['conexion'];
    }

    public function registrarCliente($nombreUsuario, $contraseña, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento) {
<<<<<<< HEAD
        $fechaRegistro = date('Y-m-d'); 

=======
        $fechaRegistro = date('Y-m-d'); // Obtener fecha actual
    
        // Hash de la contraseña
        $contraseñaHasheada = hash('sha256', $contraseña);
    
>>>>>>> 080e3bb41708978f5cee925a9b3ba1baeea1328a
        $stmt = $this->conexion->prepare("CALL i_Cliente(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $fechaRegistro, $nombre, $apellido, $telefono, $correo, $genero, $fechaNacimiento, $nombreUsuario, $contraseñaHasheada);
    
        if ($stmt->execute()) {
            return true; // Si la ejecución es exitosa
        } else {
            throw new Exception("Error al insertar cliente: " . $stmt->error);
        }
    }
}
?>

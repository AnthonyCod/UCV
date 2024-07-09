<?php
class Producto {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function obtenerProductos() {
        $query = "SELECT * FROM productos";
        $resultado = $this->db->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
?>

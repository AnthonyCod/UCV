<?php
require_once '../modelo/M_V_Producto.php';

class ProductoController {
    private $productoModelo;

    public function __construct($database) {
        $this->productoModelo = new Producto($database);
    }

    public function mostrarProductos() {
        $productos = $this->productoModelo->obtenerProductos();
        require 'views/productosView.php';
    }
}
?>

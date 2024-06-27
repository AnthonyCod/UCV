<?php
class Producto
{
    private $conexion;
    private $categoriaId;
    private $ruc;
    private $nombre;
    private $descripcion;
    private $precio;
    private $image;

    public function __construct($conexion, $categoriaId = null, $ruc = null, $nombre = null, $descripcion = null, $precio = null, $image = null) {
        $this->conexion = $conexion;
        $this->categoriaId = $categoriaId;
        $this->ruc = $ruc;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->image = $image;
    }

    // Getters y Setters
    public function getCategoriaId() { return $this->categoriaId; }
    public function getRuc() { return $this->ruc; }
    public function getNombre() { return $this->nombre; }
    public function getDescripcion() { return $this->descripcion; }
    public function getPrecio() { return $this->precio; }
    public function getImage() { return $this->image; }

    public function setCategoriaId($categoriaId) { $this->categoriaId = $categoriaId; }
    public function setRuc($ruc) { $this->ruc = $ruc; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setPrecio($precio) { $this->precio = $precio; }
    public function setImage($image) { $this->image = $image; }

    // Método para guardar un producto en la base de datos utilizando el procedimiento almacenado
    public function guardarProducto($nombre, $descripcion, $precio, $image, $descripcionCategoria) {
        $precio = floatval($precio); // Asegurarse de que el precio es un decimal
        $consulta = "CALL i_Producto(?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param('ssdss', $nombre, $descripcion, $precio, $descripcionCategoria, $image);

        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }

        $resultado = $stmt->get_result();
        if ($resultado) {
            $mensaje = $resultado->fetch_assoc();
            if (isset($mensaje['mensaje'])) {
            }
        }

        return true;
    }

    public static function obtenerCategorias($conexion) {
        $consulta = "SELECT descripcion FROM categoria";
        $resultado = $conexion->query($consulta);

        if (!$resultado) {
            throw new Exception("Error al ejecutar la consulta: " . $conexion->error);
        }

        $categorias = [];
        while ($row = $resultado->fetch_assoc()) {
            $categorias[] = $row['descripcion'];
        }

        return $categorias;
    }

    public function obtenerProductosActivos() {
        $consulta = "call c_producto()";
        $resultado = $this->conexion->query($consulta);
    
        if (!$resultado) {
            throw new Exception("Error al ejecutar la consulta: " . $this->conexion->error);
        }
    
        $productos = [];
        while ($row = $resultado->fetch_assoc()) {
            $productos[] = $row;
        }
    
        return $productos;
    }
    public function eliminarProducto($nombre) {
        $consulta = "call a_producto(?)";
        $stmt = $this->conexion->prepare($consulta);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param('s', $nombre);

        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }

        return true;
    }

    
}
?>

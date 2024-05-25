<?php
class Producto
{
    private $conexion;
    private $categoriaId;
    private $ruc;
    private $nombre;
    private $descripcion;
    private $precio;

    public function __construct($conexion, $categoriaId = null, $ruc = null, $nombre = null, $descripcion = null, $precio = null) {
        $this->conexion = $conexion;
        $this->categoriaId = $categoriaId;
        $this->ruc = $ruc;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    // Getters
    public function getCategoriaId() {
        return $this->categoriaId;
    }

    public function getRuc() {
        return $this->ruc;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    // Setters
    public function setCategoriaId($categoriaId) {
        $this->categoriaId = $categoriaId;
    }

    public function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    // Método para guardar un producto en la base de datos utilizando el procedimiento almacenado
    public function guardarProducto($nombre, $descripcion, $precio, $descripcionCategoria) {
        $precio = floatval($precio); // Asegurarse de que el precio es un decimal
        $consulta = "CALL i_Producto(?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($consulta);

        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $this->conexion->error);
        }

        $stmt->bind_param('ssds', $nombre, $descripcion, $precio, $descripcionCategoria);

        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }

        $resultado = $stmt->get_result();
        if ($resultado) {
            $mensaje = $resultado->fetch_assoc();
            if (isset($mensaje['mensaje'])) {
                echo $mensaje['mensaje'] . "<br>";
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

    
}
?>

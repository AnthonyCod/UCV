<?php
//implementar la clase
class Producto
{
    //declaracion de variables
    private $conexion;
    private $categoriaId;
    private $ruc;
    private $nombre;
    private $descripcion;
    private $precio;

    //metodo constructor
    public function __construct($conexion,$categoriaId=null,$ruc=null,$nombre=null,$descripcion=null,$precio=null) {
        $this->conexion=$conexion;
        $this->categoriaId = $categoriaId;
        $this->ruc = $ruc;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }
    // Getters
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    public function getRuc()
    {
        return $this->ruc;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    //seter
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;
    }

    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function guardarProducto($categoriaId,$ruc,$nombre,$descripcion,$precio){
        $consulta = "INSERT INTO producto(categoriaID,RUC,nombreProducto,descripcionProducto,precio) 
                        VALUES(?,?,?,?,?);";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param(
            'iissd',
            $categoriaId,
            $ruc,
            $nombre,
            $descripcion,
            $precio
        );
        return $stmt->execute();
    }

    public function obtenerCategoriaId($descripcion){
        $consulta = "SELECT categoriaId FROM categoria WHERE descripcion=? LIMIT 1;";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bind_param('s',$descripcion);
        $stmt->execute();
        //Una vez consultado:
        $resultadofin=$stmt->get_result();
        return $resultadofin->fetch_assoc()['categoriaId'] ?? null;
    }


    public function obtenerRUC(){
        $consulta="SELECT RUC FROM establecimiento Limit 1;";
        $resultadofin = $this->conexion->query($consulta);
        return $resultadofin->fetch_assoc()['RUC'] ?? null;
    }
}

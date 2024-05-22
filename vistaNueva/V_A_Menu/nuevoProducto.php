<?php
include("../conexion.php");

if (isset($_POST['saveProduct'])) {
    if(strlen($_POST['productList']) >= 1 
    && strlen($_POST['productName']) >= 1 
    && strlen($_POST['productDescription']) >= 1 
    && strlen($_POST['productPrice']) >= 1){

        $lista = trim($_POST['productList']);
        $name = trim($_POST['productName']);
        $description = trim($_POST['productDescription']);
        $price = trim($_POST['productPrice']);

        $consulta1 = "select categoriaId from categoria where '$lista' = descripcion;";

        $resultado1 = mysqli_query($conexion, $consulta1);

        if($resultado1){
            $prueba = mysqli_fetch_assoc($resultado1);  

            $consulta2 = "select RUC from establecimiento;";

            $resultado2 = mysqli_query($conexion, $consulta1);
    
            if($resultado2){
                $prueba2 = mysqli_fetch_assoc($resultado2);  
                $consulta = "INSERT INTO producto(categoriaId, RUC, nombreProducto, descripcionProducto,precio) VALUES ('$prueba','$prueba2','$name','$description','$price');";
            }
        }
} 
}

?>
<?php
include("../conexion.php");

if (isset($_POST['saveProduct'])) {
    if(strlen($_POST['productList']) >= 1 
    && strlen($_POST['productName']) >= 1 
    && strlen($_POST['productDescription']) >= 1 
    && strlen($_POST['productPrice']) >= 1){

        $lista = mysqli_real_escape_string($conexion, trim($_POST['productList']));
        $name = mysqli_real_escape_string($conexion, trim($_POST['productName']));
        $description = mysqli_real_escape_string($conexion, trim($_POST['productDescription']));
        $price = mysqli_real_escape_string($conexion, trim($_POST['productPrice']));

        $consulta1 = "SELECT categoriaId FROM categoria WHERE descripcion = '$lista' LIMIT 1;";

        $resultado1 = mysqli_query($conexion, $consulta1);

        if($resultado1 && mysqli_num_rows($resultado1) > 0){
            $fila1 = mysqli_fetch_assoc($resultado1);
            $categoriaId = $fila1['categoriaId'];

            $consulta2 = "SELECT RUC FROM establecimiento LIMIT 1;";

            $resultado2 = mysqli_query($conexion, $consulta2);
    
            if($resultado2 && mysqli_num_rows($resultado2) > 0){
                $fila2 = mysqli_fetch_assoc($resultado2);
                $ruc = $fila2['RUC'];

                $consulta3 = "INSERT INTO producto(categoriaId, RUC, nombreProducto, descripcionProducto, precio) 
                VALUES ('$categoriaId', '$ruc', '$name', '$description', '$price');";

                $resultado3 = mysqli_query($conexion, $consulta3);

                if ($resultado3) {
                    echo "Producto insertado correctamente.";
                } else {
                    echo "Error al insertar producto: " . mysqli_error($conexion);
                }
            } else {
                echo "Error al obtener RUC: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al obtener categoriaId: " . mysqli_error($conexion);

        }
    } else {
        echo "Todos los campos son requeridos.";
}
}
?>

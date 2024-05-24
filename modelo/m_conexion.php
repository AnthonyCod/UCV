<?php
    /* Declaracion de variables de conexion */
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $database = "bnabxjshqgmawevpokn5 (1)";
    /*Instanciacion de la variable conexion con el objeto mysqli */
    function conectar($servidor, $user, $pass, $database)
    {
        /*Condicional para evaluar la conexion */
        $conexion = new mysqli($servidor,$user,$pass,$database);

        if ($conexion->connect_errno) {
            die("No se pudo establecer la conexión: \n" . $conexion->connect_errno);
        } else {
            echo "Se estableció la conexión correctamente \n";
            return $conexion;
        }
    }

    // Llama a la función con las variables de conexión
    $conexion = conectar($servidor, $user, $pass,$database);
?>
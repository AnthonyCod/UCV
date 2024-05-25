<?php
    /* Declaracion de variables de conexion */
    $servidor = "localhost";
    $user = "root";
    $pass = "";
    $database = "ucvfood";
    /*Instanciacion de la variable conexion con el objeto mysqli */
    function conectar($servidor, $user, $pass, $database)
    {
        /*Condicional para evaluar la conexion */
        $conexion = new mysqli($servidor,$user,$pass,$database);

        if ($conexion->connect_errno) {
            die("No se pudo establecer la conexión: \n" . $conexion->connect_errno);
        } else {
            return $conexion;
        }
    }

    // Llama a la función con las variables de conexión
    $conexion = conectar($servidor, $user, $pass,$database);
?>
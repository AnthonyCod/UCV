<?php
    include "conexion.php";
    $sql = $conexion->prepare("SELECT * FROM categoria");
    $sql->execute();
    $response = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    print_r($response);
?>

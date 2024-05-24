<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comidaweb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

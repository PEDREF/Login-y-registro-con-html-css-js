<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flowerslogistics";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Establecer el juego de caracteres UTF-8
$conn->set_charset("utf8");

// Cerrar la conexión
//$conn->close();
?>

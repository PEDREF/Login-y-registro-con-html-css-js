<?php
    include '../conexion.php';

    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $value = $_GET['value'];
        $choferId =  $_SESSION['id'];
        // echo $value;
        $sql = "UPDATE viaje SET status='$value', choferId='$choferId' WHERE ID='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Ruta actualizado exitosamente";
            header("Location: http://localhost/Viaje/LeerViaje.php");
            exit; 
        } else {
            echo "Error al actualizar el Ruta: " . $conn->error;
        }
        
    }
?>
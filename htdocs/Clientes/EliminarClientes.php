<!DOCTYPE html>
<html>
<head>
    <title>Eliminado</title>
    <!-- Incluye los archivos de Bootstrap -->
    <!-- <link rel="stylesheet" href="ruta/bootstrap.min.css"> -->
    <!-- <script src="ruta/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include '../conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "DELETE FROM clientes WHERE Id='$id'";
        if ($conn->query($sql) === TRUE) {
         // Procesa los datos aquí..

            $mensaje = "El cliente fue eliminado con éxito.";
            $tipoAlerta = "success"; // Puede ser "success", "info", "warning" o "danger"
            // Muestra la alerta utilizando clases de Bootstrap
            echo '<div class="alert alert-' . $tipoAlerta . '">' . $mensaje . '</div>';

            // sleep(10);
            // header("Location: LeerClientes.php");

        } else {
            // Procesa los datos aquí...
            $mensaje = "Error al eliminar el cliente.";
            $tipoAlerta = "danger"; // Puede ser "success", "info", "warning" o "danger"

            // Muestra la alerta utilizando clases de Bootstrap
            echo '<div class="alert alert-' . $tipoAlerta . '">' . $mensaje . '</div>';

        }
    }
    ?>
    <a href="../../Clientes/LeerClientes.php">  
        Volver
    </a>
</body>
</html>

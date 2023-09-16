

<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $licencia = $_POST['licinciaconducir'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    // echo json_encode($_POST);

    // Actualizar datos en la tabla ChoferNombre, LicenciaConducir, 	EmpresaID, contraseña, username
    $sql = "UPDATE chofer SET Nombre='$nombre', LicenciaConducir='$licencia', username='$username',  contraseña='$password' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Chofer actualizado exitosamente";
        header("Location: http://localhost/Chofer/LeerChofer.php");
        exit; 
    } else {
        echo "Error al actualizar el chofer: " . $conn->error;
    }
}

// Obtener ID del chofer a modificar
$id = $_GET['id'];

// Obtener datos del chofer de la base de datos
$sql = "SELECT * FROM chofer WHERE Id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlowerLogistics</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    <!-- Topbar -->
    <?php
        include('../topbar.php');

    ?>
    <!-- Sidebar -->
    <?php
        include('../sidebar.php');
    ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
                <br><br>
                <!-- contenido de la pagina -->
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                        <div class="container-fluid">
                            <div class="container">
                                <div class="col col-sm-12 col-md-12">
                                    <h2>Formulario de Chofer</h2>
                                </div>

                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <label for="nombre">Nombre:</label>
                                        </div>
                                        <div class="col col-sm-6 col-md-6">
                                            <!-- <input class="form-control" type="text" id="nombre" name="nombre" required> -->
                                            <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required><br><br>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <label for="licinciaconducir">LicenciaConducir :</label>
                                        </div>
                                        <div class="col col-sm-6 col-md-6">
                                            <!-- <input class="form-control" type="text" id="licinciaconducir" name="licinciaconducir" required> -->
                                            <input class="form-control" type="text" id="licinciaconducir" name="licinciaconducir" value="<?php echo $row['LicenciaConducir']; ?>" required><br>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <label for="nombre">Nombre usuario:</label>
                                            <!-- <input class="form-control" type="text" id="nombre" name="username" required> -->
                                        </div>
                                        <div class="col col-sm-6 col-md-6">
                                            <input class="form-control" type="text" id="nombre" name="username" value="<?php echo $row['username']; ?>" required><br>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <label for="pass">Contraseña:</label>
                                            <!-- <input class="form-control" type="text" id="nombre" name="username" required> -->
                                        </div>
                                        <div class="col col-sm-6 col-md-6">
                                            <input class="form-control" type="password" id="nombre" name="password" value="<?php echo $row['contraseña']; ?>" required><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12 col-md-12">
                                        <div class="col col-sm-6 col-md-6">
                                            <input class="btn btn-primary btn-block" type="submit" value="Guardar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <br><br>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <!-- Page content goes here -->
          <!-- <p>Content goes here</p> -->
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php
        include('../footer.php')
    ?>

</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
        // console.log("hola")
    });
</script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>

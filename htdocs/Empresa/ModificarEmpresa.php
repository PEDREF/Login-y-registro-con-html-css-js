


<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    // echo json_encode($_POST);

    // Actualizar datos en la tabla Empresa
    $sql = "UPDATE empresa SET Nombre='$nombre', Direccion='$direccion', Telefono='$telefono' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Empresa actualizado exitosamente";
        header("Location: http://localhost/Empresa/LeerEmpresa.php");
        exit; 
    } else {
        echo "Error al actualizar el Empresa: " . $conn->error;
    }
}

// Obtener ID del Empresa a modificar
$id = $_GET['id'];

// Obtener datos del Empresa de la base de datos
$sql = "SELECT * FROM empresa WHERE Id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>




<!DOCTYPE html>
<html>
<head>
    <title>FloweLogistics</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    <div class="container-2">
        <?php
            include '../sidebar.php';
        ?>
        <div class="content">
            <?php
                include '../topbar.php';
            ?>
            <br>
            <br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                <div class="container-fluid">
                    <div class="container">
                        <div class="col col-sm-12 col-md-12">
                            <h2>Formulario de Empresa</h2>
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
                                    <label for="direccion">Direccion:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="direccion" name="direccion" required> -->
                                    <input class="form-control" type="text" id="direccion" name="direccion" value="<?php echo $row['Direccion']; ?>" required><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="telefono">Telefono:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="telefono" name="telefono" required> -->
                                    <input class="form-control" type="text" id="telefono" name="telefono" value="<?php echo $row['Telefono']; ?>" required><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="mensaje">Empresa:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <select class="form-control" name="empresa">
                                        <option value="1" <?php if ($row['EmpresaID'] == 1) echo "selected"; ?>>Value 1</option>
                                        <option value="2" <?php if ($row['EmpresaID'] == 2) echo "selected"; ?>>Value 2</option>
                                        <option value="3" <?php if ($row['EmpresaID'] == 3) echo "selected"; ?>>Value 3</option>
                                    </select>
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
            <br>
            <br>
            <?php
                include('../footer.php');
            ?>
        </div>
    </div>
    <script src="../script2.js"></script>
</body>
</html>


<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $dirección = $_POST['dirección'];
    $teléfono = $_POST['teléfono'];

    $sql = "INSERT INTO empresa (Nombre, Direccion, Telefono) VALUES ('$nombre', '$dirección', '$teléfono')";
    if ($conn->query($sql) === TRUE) {
        echo "Empresa creada exitosamente";
    } else {
        echo "Error al crear la empresa: " . $conn->error;
    }
}
?>

<!-- </body>
</html> -->


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
                                    <input class="form-control" type="text" id="nombre" name="nombre" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="dirección">Dirección :</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <input class="form-control" type="text" id="dirección" name="dirección" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="teléfono">Teléfono :</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <input class="form-control" type="number" id="teléfono" name="teléfono" required>
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
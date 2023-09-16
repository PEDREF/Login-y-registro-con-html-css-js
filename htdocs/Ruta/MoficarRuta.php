
<?php
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $distancia = $_POST['distancia'];
    // echo json_encode($_POST);

    // Actualizar datos en la tabla Ruta
    $sql = "UPDATE Ruta SET Origen='$origen', Destino='$destino', Distancia='$distancia' WHERE ID='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Ruta actualizado exitosamente";
        header("Location: http://localhost/Ruta/LeerRuta.php");
        exit; 
    } else {
        echo "Error al actualizar el Ruta: " . $conn->error;
    }
}

// Obtener ID del Ruta a modificar
$id = $_GET['id'];

// Obtener datos del Ruta de la base de datos
$sql = "SELECT * FROM Ruta WHERE Id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>




<!DOCTYPE html>
<html>
<head>
    <title>Sidebar con animación</title>
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
                            <h2>Formulario de Ruta</h2>
                        </div>

                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="origen">Origen:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="origen" name="origen" required> -->
                                    <input class="form-control" type="text" id="origen" name="origen" value="<?php echo $row['Origen']; ?>" required><br><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="destino">Destino:</label>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="text" id="destino" name="destino" required> -->
                                    <input class="form-control" type="text" id="destino" name="destino" value="<?php echo $row['Destino']; ?>" required><br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12 col-md-12">
                                <div class="col col-sm-6 col-md-6">
                                    <label for="distancia">Distancia:</label><br>
                                </div>
                                <div class="col col-sm-6 col-md-6">
                                    <!-- <input class="form-control" type="number" id="distancia" name="distancia" required> -->
                                    <input class="form-control" type="number" id="distancia" name="distancia" value="<?php echo $row['Distancia']; ?>" required><br>

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
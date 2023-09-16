<?php
include '../../conexion.php';
$viajeId = $_GET['id'];
// echo $viajeId;
// Obtener datos del Viaje de la base de datos

?>
<?php
// include '../../conexion.php';
// echo $_POST['tipo_archivo'];

try {

    if (array_key_exists('imagen' ,$_FILES) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Ruta de destino donde se guardará la imagen
        $tipo_archivo = $_POST['tipo_archivo'];
        $id_viaje = $_POST['viajeId'];
        $nombreImagen = $_FILES['imagen']['name'];//uniqid('img_') . '.' . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $basePath = $_SERVER['DOCUMENT_ROOT'];
        if($tipo_archivo == 1){
            $directorioDestino = $basePath.'/uploads'.'/kmAntes'.'/';
            $archivoSimple='/uploads'.'/kmAntes'.'/'.$nombreImagen;

        }elseif($tipo_archivo == 2){
            $directorioDestino = $basePath.'/uploads'.'/kmDespues'.'/';
            $archivoSimple='/uploads'.'/kmDespues'.'/'.$nombreImagen;
        }elseif($tipo_archivo == 3){
            $directorioDestino = $basePath.'/uploads'.'/peaje'.'/';
            $archivoSimple='/uploads'.'/peaje'.'/'.$nombreImagen;
        }elseif($tipo_archivo == 4){
            $directorioDestino = $basePath.'/uploads'.'/entrega'.'/';
            $archivoSimple='/uploads'.'/entrega'.'/'.$nombreImagen;
        }
        // Mover la imagen al directorio de destino
        $archivo = $directorioDestino.$nombreImagen;
        // $archivoSimple='/uploads'.'/'.$nombreImagen;

        if(!is_dir($directorioDestino)){
            // mkdir($directorioDestino, 0755, true);
            mkdir($directorioDestino, 0777, true);
        }
        // echo $directorioDestino.'/'.$nombreImagen;
        $res = move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo);

        if($res){
            // Mostrar la imagen subida
            $sql = "INSERT INTO archivos (path, basepath, medicionId, tipo_archivo) VALUES ('$archivoSimple', '$archivo', $id_viaje,'$tipo_archivo')";
            if ($conn->query($sql) === true) {
                echo "Archivos creado exitosamente";
                header("Location: http://localhost/Medicion/img/LeerImgViajes.php?id=$id_viaje");
                exit; 
            } else {
                echo $sql;//"Error al crear el archivo: " . $conn->error;
            }            

            // echo $archivo.'<h2>:</h2>';
            // echo '<br><img src="../../' . $archivoSimple . '" alt="Imagen subida">';
        }else{
            // echo "anda a acostarte ctm";
        }
    } else {
        if (array_key_exists('imagen' ,$_FILES)) {
            echo $_FILES['imagen']['error'];
        }
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
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
        include('../../topbar.php');

    ?>
    <!-- Sidebar -->
    <?php
        include('../../sidebar.php');
    ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
            <br>
              <!-- <form  method="POST" enctype="multipart/form-data">
                 <input type="submit" value="Subir"> 
              </form> -->
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="col col-sm-12 col-md-12">
                                <h2>Formulario de imagenes</h2>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="rutaid">tipo de imagen:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <select class="form-control" name="tipo_archivo">
                                            <option value=""></option>
                                            <option value="1">Kilometraje Antes</option>
                                            <option value="2">Kilometraje Despues</option>
                                            <option value="3">Peaje</option>                                             
                                            <option value="4">Entrega</option>                                             
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-sm-12 col-md-12">
                                    <div class="col col-sm-6 col-md-6">
                                        <label for="gasto">Selecciona una imagen:</label><br>
                                    </div>
                                    <div class="col col-sm-6 col-md-6">
                                        <input type="file" name="imagen" accept="image/*">
                                        <input type="hidden" name="viajeId" value="<?php echo $viajeId;?>">
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
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">

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
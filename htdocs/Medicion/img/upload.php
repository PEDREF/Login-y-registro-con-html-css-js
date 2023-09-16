<?php
include '../../conexion.php';

try {

    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Ruta de destino donde se guardará la imagen
        $tipo_archivo = $_POST['tipo_archivo'];
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
            $sql = "INSERT INTO archivos (path, basepath, viajeId, tipo_archivo) VALUES ('$archivoSimple', '$archivo', 1, '$tipo_archivo')";
            if ($conn->query($sql) === true) {
                echo "Archivos creado exitosamente";
                // header("Location: http://localhost/Viaje/LeerViaje.php");s
                exit; 
            } else {
                echo "Error al crear el viaje: " . $conn->error;
            }            

            // echo $archivo.'<h2>:</h2>';
            // echo '<br><img src="../../' . $archivoSimple . '" alt="Imagen subida">';
        }else{
            // echo "anda a acostarte ctm";
        }
    } else {
        // throw new Exception('Error al subir la imagen: ' . $_FILES['imagen']['error']);
        echo $_FILES['imagen']['error'];
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

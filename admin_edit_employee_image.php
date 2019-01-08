<?php

require 'seguridad.php'; // Acceso para el admin
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

// get ID
$id = $_GET['id'];

// get file
$file = $_FILES["fileToUpload"]["tmp_name"];

// get file type (Integer)
$imageFileType = exif_imagetype($file);

// Check if image file is a actual image
if(isset($_POST["submit"])) {
    $check = getimagesize($file);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        $_SESSION["message-warning"] = "El archivo tiene que ser un imagen.";
        header("Location: admin_empleado.php?id=$id");
    }
}

// Check file size (maximum file size 1000kb)
elseif ($_FILES["fileToUpload"]["size"] > 1000000) {
    $_SESSION["message-warning"] = "El archivo es demasiado grande. Máximo: 1MB";
    header("Location: admin_empleado.php?id=$id");
}

// // Allow certain mime types (Integer values: 1=IMAGETYPE_GIF, 2=IMAGETYPE_JPEG, 3=IMAGETYPE_PNG)
elseif($imageFileType != 1 && $imageFileType != 2 && $imageFileType != 3) {
  $_SESSION["message-warning"] = "Por favor, suba un JPEG, PNG o GIF.";
  header("Location: admin_empleado.php?id=$id");
}

// Si todo está bien, el archivo puede ser subido en la base de datos.
else {

  $imgContent = file_get_contents($file);

  if($editEmployee = $connection->prepare("UPDATE employee SET image=? WHERE `id`=? ")) {

    $editEmployee->bind_param("si", $imgContent, $id);
    $editEmployee->execute();
    $editEmployee->close();
    $_SESSION["message-success"] = "Imagen cambiado.";
    header("Location: admin_empleado.php?id=$id");

  } else {
    printf("Error: %s\n", $connection->error . $editEmployee);
  }

}

?>

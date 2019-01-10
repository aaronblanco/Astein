<?php

require 'seguridad.php'; // Acceso para el admin
require 'connection.php';
require 'log_funcion.php';

header('Content-type: text/plain; charset=utf-8');

// get ID
$id = $_GET['id'];
$id_offer = $_POST['id_offer'];
echo "ID of photo:".$id;
echo "ID of offer:".$id_offer;

// Even if no file was uploaded, we can update the code of the offer

if($editOfferID = $connection->prepare("UPDATE photoinicio SET id_offer=? WHERE `ID`=? ")) {
  if($id_offer == '') {
    $id_offer = NULL;
  }
    $editOfferID->bind_param("ii", $id_offer, $id);
    $editOfferID->execute();
    $editOfferID->close();
  } else {
    printf("Error: %s\n", $connection->error . $editOfferID);
}

// If no file was uploaded, the db operation is complete.
if (!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    echo 'No upload';
    $_SESSION["message-success"] = "Código de oferta asociada cambiado.";
    echo $_SESSION["message-success"];
    header("Location: admin_edit_inicio_image.php?id=$id");
} else {
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
          header("Location: admin_edit_inicio_image.php?id=$id");
      }
  }

  // Check file size (maximum file size 2000kb)
  elseif ($_FILES["fileToUpload"]["size"] > 2000000) {
      $_SESSION["message-warning"] = "El archivo es demasiado grande. Máximo: 2MB";
      header("Location: admin_edit_inicio_image.php?id=$id");
  }

  // // Allow certain mime types (Integer values: 1=IMAGETYPE_GIF, 2=IMAGETYPE_JPEG, 3=IMAGETYPE_PNG)
  elseif($imageFileType != 1 && $imageFileType != 2 && $imageFileType != 3) {
    $_SESSION["message-warning"] = "Por favor, suba un JPEG, PNG o GIF.";
    header("Location: admin_edit_inicio_image.php?id=$id");
  }

  // Si todo está bien, el archivo puede ser subido en la base de datos.
  else {

    $imgContent = file_get_contents($file);

    if($editOffer = $connection->prepare("UPDATE photoinicio SET image=? WHERE `id`=? ")) {

      $editOffer->bind_param("si", $imgContent, $id);
      $editOffer->execute();
      $editOffer->close();
      write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                   "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                   ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                   $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                   $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                   $_SERVER['REQUEST_URI']. "\nFoto de inicio con ID $id cambiada","INFO");
      $_SESSION["message-success"] = "Imagen cambiado.";
      header("Location: admin_imagenes.php");

    } else {
      printf("Error: %s\n", $connection->error . $editOffer);
      write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                   "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                   ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                   $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                   $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                   $_SERVER['REQUEST_URI']. "\nError en cambiar la foto del inicio","ERROR");
    }

  }
}

?>

<?php

require 'seguridad.php'; // Acceso para el admin
require 'connection.php';

header('Content-type: text/plain; charset=utf-8');

$id_offer = $_POST['id_offer'];
echo "ID of offer:".$id_offer;

if($editOfferID = $connection->prepare("UPDATE photoinicio SET id_offer=? WHERE `ID`=? ")) {

    $editOfferID->bind_param("ii", $id_offer, $id);
    $editOfferID->execute();
    $editOfferID->close();
  } else {
    printf("Error: %s\n", $connection->error . $editOfferID);
}

// If no file was uploaded, the db operation is cancelled.
if (!file_exists($_FILES['fileToUpload']['tmp_name']) || !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    $_SESSION["message-warning"] = "Por favor, sube un imagen como JPEG, PNG o GIF.";
    echo $_SESSION["message-warning"];
    header("Location: admin_new_inicio_image.php");
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
          header("Location: admin_new_inicio_image.php");
      }
  }

  // Check file size (maximum file size 2000kb)
  elseif ($_FILES["fileToUpload"]["size"] > 2000000) {
      $_SESSION["message-warning"] = "El archivo es demasiado grande. Máximo: 2MB";
      header("Location: admin_new_inicio_image.php");
  }

  // // Allow certain mime types (Integer values: 1=IMAGETYPE_GIF, 2=IMAGETYPE_JPEG, 3=IMAGETYPE_PNG)
  elseif($imageFileType != 1 && $imageFileType != 2 && $imageFileType != 3) {
    $_SESSION["message-warning"] = "Por favor, suba un JPEG, PNG o GIF.";
    header("Location: admin_new_inicio_image.php");
  }

  // Si todo está bien, el archivo y el código de la oferta pueden ser subidos en la base de datos.
  else {

    $imgContent = file_get_contents($file);

    if($editOffer = $connection->prepare("INSERT INTO photoinicio (image, id_offer) VALUES (?, ?) ")) {
      if($id_offer == '') {
        $id_offer = NULL;
      }
      $editOffer->bind_param("si", $imgContent, $id_offer);
      $editOffer->execute();
      $editOffer->close();
      $_SESSION["message-success"] = "Nuevo imagen subido.";
      header("Location: admin_imagenes.php");

    } else {
      printf("Error: %s\n", $connection->error . $editOffer);
    }

  }
}

?>

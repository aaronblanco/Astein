<?php
require 'connection.php';
require "log_funcion.php";
session_start();

$name = strip_tags($_POST['name']);
$lastname = strip_tags($_POST['lastname']);
$mail = strip_tags($_POST['mail']);
$phone = strip_tags($_POST['phone']);
$message = strip_tags($_POST['message']);

// get file
$file = $_FILES["fileToUpload"]["tmp_name"];

// get file type (Integer)
$imageFileType = exif_imagetype($file);
echo "$imageFileType";

$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
$imageFileType = finfo_file($fileInfo, $file);

// Check if CV was submitted
if (!isset($_FILES["fileToUpload"])) {
	$_SESSION["message-warning"] = "Por favor, no olvides subir tu curriculum vitae.";
	echo $_SESSION["message-warning"];
	// header("Location: trabajar.php");
}

// Check file size (maximum file size 2mb)
elseif ($_FILES["fileToUpload"]["size"] > 2000000) {
    $_SESSION["message-warning"] = "El archivo es demasiado grande. Máximo: 2MB";
		echo $_SESSION["message-warning"];
		// header("Location: trabajar.php");
}

// // Allow certain mime types (Integer value: 1=IMAGETYPE_GIF, 2=IMAGETYPE_JPEG, 3=IMAGETYPE_PNG)
elseif($imageFileType != 'application/pdf') {
  $_SESSION["message-warning"] = "Por favor, sube tu curriculum vitae como PDF.";
	echo $_SESSION["message-warning"];
	// header("Location: trabajar.php");
}

// Si todo está bien, el archivo puede ser subido en la base de datos.
else {

  $cv = file_get_contents($file);

  if ($addApplicant = $connection->prepare("INSERT INTO applicant (firstname, lastname, email, phone, message, cv) values (?,?,?,?,?,?)")) {
		$addApplicant->bind_param("ssssss", $firstname, $lastname, $mail, $phone, $message, $cv);
    $addApplicant->execute();
    $addApplicant->close();
		write_log("Creado nuevo solicitante $firstname $lastname.");

    $_SESSION["message-success"] = "Gracias $firstname, tus datos han sido enviados con éxito. ";
    header("Location: inicio.php");

  } else {
    printf("Error: %s\n", $connection->error . $addApplicant);
  }
}

?>

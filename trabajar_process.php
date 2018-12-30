<?php
include("connection.php");
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$mail = $_POST['mail'];

$phone = $_POST['phone'];
$message = $_POST['message'];


$query = $connection->prepare("INSERT INTO applicant (firstname, lastname, email, phone, message) values (?,?,?,?,?)");
$query->bind_param("sssis", $name, $lastname, $mail, $phone, $message)
$query->execute();
$query->close();


//$cv = $_POST['cv']; hay que implementar el subido de archivos pdf

$ftp = ftp_connect("www./test.astein.net");

$login = ftp_login(ftp, "dpyrmjuf", "1K5g6kfFm3");

if ((!$ftp) || (!$resultado)) {
		echo "Fallo en la conexión"; die;
	} else {
		echo "Conectado.";
	}
ftp_pasv ($ftp, true) ;
ftp_chdir($ftp, "cvs");

$local = $_FILES["archivo"]["name"];
$remoto = $_FILES["archivo"]["tmp_name"];
$size = $_FILES["archivo"]["size"];

$ruta = "/test.astein.net/cvs/" . $local;
if (!$tama<=$_POST["MAX_FILE_SIZE"]){
		echo "Excede el tamaño del archivo...<br />";
	} else {
		// Verificamos si ya se subio el archivo temporal
		if (is_uploaded_file($remoto)){
			// copiamos el archivo temporal, del directorio de temporales de nuestro servidor a la ruta que creamos
			copy($remoto, $ruta);
		}
		// Sino se pudo subir el temporal
		else {
			echo "no se pudo subir el archivo " . $local;
		}
	}
	echo "Ruta: " . $ruta;
	//cerramos la conexión FTP
	ftp_close($ftp);

header("Location: trabajar.html");
?>

<?php
include("connection.php");
include("log_funcion");
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$mail = $_POST['mail'];

$phone = $_POST['phone'];
$message = $_POST['message'];


$query = $connection->prepare("INSERT INTO applicant (firstname, lastname, email, phone, message) values (?,?,?,?,?)");
$query->bind_param("sssss", $name, $lastname, $mail, $phone, $message);
$query->execute();
$query->close();


if(is_uploaded_file($_FILES["archivo"]["tmp_name"]))
{
	# Definimos las variables
	$host="s32.profesionalhosting.com";
	$port=21;
	$user="asteinweb";
	$password="FtpWeb18";
	$ruta="cvs";

	# Realizamos la conexion con el servidor
	$conn_id=@ftp_connect($host,$port);
	if($conn_id)
	{
		# Realizamos el login con nuestro usuario y contraseña
		if(@ftp_login($conn_id,$user,$password))
		{
			# Canviamos al directorio especificado
			if(@ftp_chdir($conn_id,$ruta))
			{
				# Subimos el fichero
				if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY)) {
					echo "Fichero subido correctamente";
					write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                             "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                             ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                             $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                             $_SERVER['REQUEST_URI'],"INFO");

				} else
					echo "No ha sido posible subir el fichero";
			}else
				echo "No existe el directorio especificado";
		}else
			echo "El usuario o la contraseña son incorrectos";
		# Cerramos la conexion ftp
		ftp_close($conn_id);
	}else
		echo "No ha sido posible conectar con el servidor";
}else{
   echo "Selecciona un archivo...";
}
?>

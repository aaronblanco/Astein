<?php
session_start();
?>

<?php
	include("connection.php");
	include("log_funcion.php");
	$username = $_POST['usuario'];
	$password = $_POST['password'];


		$query =  "SELECT * FROM administrator WHERE username = '$username' AND password ='$password' ";


		$result = $connection->query($query);
		if(mysqli_num_rows($result) == 1 )
	 {

			$_SESSION['loggedin'] = true;
			$_SESSION['name'] = "administrador";
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
			header("Location: admin_inicio.php");

			write_log("Estro es una prueba","Debug");
			write_log("Se ha producido un error en el método xxxx. el valor de la variable es $variable","Error");
			write_log("Navegador: ".$_SERVER['HTTP_USER_AGENT'].$titulo,"Info");

		} else {
			echo "<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrectos.
			<p><a href='admin_login.php'><strong>Prueba de nuevo.</strong></a></p></div>";

		}
?>


<?php
	include("connection.php");
	include("log_funcion.php");
	$username = $_POST['usuario'];
	$password = $_POST['password'];


		$admin =  "SELECT * FROM administrator WHERE username = '$username' AND password ='$password' ";

		$worker =  "SELECT * FROM employee WHERE username = '$username' AND password ='$password' ";


		$result = $connection->query($admin);
		$result2 = $connection->query($worker);
		if(mysqli_num_rows($result) == 1 )
	 {

			$_SESSION['loggedin'] = true;
			$_SESSION['admin'] = $row['username'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
			session_start();

			header("Location: admin_inicio.php");
			exit();

		}
		else if(mysqli_num_rows($result2) > 0 ){

						$_SESSION['loggedin'] = true;
						$_SESSION['name'] = $row['username'];
						$_SESSION['start'] = time();
						$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
						session_start();
						
						header("Location: inicio.php");
						exit();
		}




		else {
			echo "<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrectos.
			<p><a href='admin_login.php'><strong>Prueba de nuevo.</strong></a></p></div>";

		}
?>

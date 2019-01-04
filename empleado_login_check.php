<?php
session_start();
?>

<?php
	include("connection.php");

	$username = $_POST['usuario'];
	$password = $_POST['password'];


		$query =  "SELECT * FROM employee WHERE username = '$username' AND password ='$password' ";


		$result = $connection->query($query);
		if(mysqli_num_rows($result) == 1 )
	 {

			$_SESSION['loggedin'] = true;
			$_SESSION['name'] = $row['username'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
			header("Location: emple_login.php");


		} else {
			echo "<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrectos.
			<p><a href='emple_login.php'><strong>Prueba de nuevo.</strong></a></p></div>";

		}
?>

<?php
session_start();
?>

<?php
	include("connection.php");

	$username = $_POST['usuario'];
	$password = $_POST['password'];


  $query_findCompany = "SELECT * from company where ID='$company_id'";
  $result = $connection->query($query_findCompany);




	$query = "SELECT username, password FROM administrator WHERE username = '$username' && password = '$password' ");
  $result = $connection->query($query);

  $row = mysqli_fetch_assoc($result);

  	$hash = $row['password'];

	/*
	password_Verify() function verify if the password entered by the user
	match the password hash on the database. If everything is ok the session
	is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
	*/
	if (password_verify($_POST['password'], $hash)) {

		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $row['username'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

		echo "<div class='alert alert-success' role='alert'><strong>Bienvenido administrador.</strong> $row[username]
		<p><a href='admin_inicio.php'>Admin inicio</a></p>
		<p><a href='logout.php'>Logout</a></p></div>";

	} else {
		echo "<div class='alert alert-danger' role='alert'>Usuario o contraseña son erroneos.
		<p><a href='admin_login.php'><strong>Por favor, intenta de nuevo.</strong></a></p></div>";

	}
?>

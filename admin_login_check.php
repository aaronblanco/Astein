
<?php
	include("connection.php");
	include("log_funcion.php");
	$email = $_POST['email'];
	$password = $_POST['password'];


		$admin =  "SELECT * FROM administrator WHERE email = '$email' AND password ='$password' ";

		$worker =  "SELECT * FROM employee WHERE email = '$email' AND password ='$password' ";


		$result = $connection->query($admin);
		$result2 = $connection->query($worker);
		if(mysqli_num_rows($result) == 1 )
	 {

		 		session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = "Admin";
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;


			header("Location: admin_inicio.php");
			exit();

		}
		else if(mysqli_num_rows($result2) > 0 ){
						session_start();
						$_SESSION['loggedin'] = true;
						$_SESSION['name'] = $row['username'];
						$_SESSION['start'] = time();
						$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;


						header("Location: admin_reservas.php");
						exit();
		}




		else {
			header("Location: admin_inicio.php");
		}
?>

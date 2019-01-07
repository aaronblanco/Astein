<?php
		require 'connection.php';
		include("log_funcion.php");

		header('Content-type: text/plain; charset=utf-8');

		$email = $_POST['email'];
		$password = $_POST['password'];

		$admin =  "SELECT * FROM administrator WHERE email = '$email' AND password ='$password' ";

		$worker =  "SELECT * FROM employee WHERE email = '$email' ";

		$team_pw =  "SELECT * FROM company WHERE team_password = '$password' "";

		$result = $connection->query($admin);
		$result2 = $connection->query($worker);
		$result3 = $connection->query($team_pw);

		if (mysqli_num_rows($result) == 1 )
		{
		 		session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = "Admin";
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + 300;

				header("Location: admin_inicio.php");
				exit();
		}

		else if ((mysqli_num_rows($result2) > 0) || (mysqli_num_rows($result3) == 1)) {
						session_start();
						$_SESSION['loggedin'] = true;
						$_SESSION['name'] = $row['firstname'];
						$_SESSION['start'] = time();
						$_SESSION['expire'] = $_SESSION['start'] + 300;

						header("Location: admin_reservas.php");
						exit();
		}

		else {
			header("Location: admin_inicio.php");
		}
?>

<?php

		require 'connection.php';
		include "log_funcion.php";

		header('Content-type: text/plain; charset=utf-8');

		$email = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);

		$query_admin = $connection->prepare("SELECT * from administrator where email=? AND password=?");
		$query_admin->bind_param("ss", $email, $password);

		$query_worker = $connection->prepare("SELECT * FROM employee WHERE email =? ");
		$query_worker->bind_param("s", $email);

		$query_team = $connection->prepare("SELECT * FROM company WHERE team_password=? ");
		$query_team->bind_param("s", $password);

		$query_admin->execute();
	  $result_admin = $query_admin->get_result();
		$query_worker->execute();
	  $result_worker = $query_worker->get_result();
		$query_team->execute();
	  $result_team = $query_team->get_result();

		if ($result_admin and (mysqli_num_rows($result_admin) == 1))
		{
		 		session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = "Admin";
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + 1800;

				$_SESSION['message-success'] = "Sesión de administrador iniciada.";
				header("Location: admin_inicio.php");
				exit();
		}

		else if (($result_worker and (mysqli_num_rows($result_worker) > 0)) and ($result_team and (mysqli_num_rows($result_team) > 0)))
		{
			session_start();
			$_SESSION['loggedin'] = true;
			$row = mysqli_fetch_assoc($result_worker);
      $_SESSION['name'] = $row['firstname'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + 1800;

			$_SESSION['message-success'] = "Sesión de empleado iniciada.";

			header("Location: admin_inicio.php");
			exit();
		}

		else {
			header("Location: admin_login.php");
		}
?>

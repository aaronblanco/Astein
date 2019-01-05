<?php
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true    )
	{
#   && isset($_SESSION['admin'])
	}

	else {
			echo "<div class='alert alert-danger' role='alert'>
			<h4>Necesitas estar conectado para acceder aquí.</h4>
			<p><a href='admin_login.php'>Iniciar sesion</a></p></div>";
			exit;
	}
			// checking the time now when home page starts
			$now = time();
			if ($now > $_SESSION['expire'] )
			{
					session_destroy();
					echo "<div class='alert alert-danger' role='alert'>
					<h4>Tu sesion ha terminado.</h4>
					<p><a href='admin_login.php'>Iniciar sesion</a></p></div>";
					exit;
			}
	?>

<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['name'] == "Administrador") {

} else {



	header("location: admin_login.php");
}
?>

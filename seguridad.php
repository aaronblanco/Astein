<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['name'] == "Admin") {

} else {


  echo "No tienes permiso para estar aquí";
//	header("location: admin_login.php");
}
?>

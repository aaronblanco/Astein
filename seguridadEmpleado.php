<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {

} else {

	header("location: admin_login.php");
}
?>

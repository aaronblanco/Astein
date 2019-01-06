<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && isset($_SESSION['name'])) {

} else {

	header("location: admin_login.php");
}
?>

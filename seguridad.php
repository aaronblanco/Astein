<?php
session_start();
if (!isset($_SESSION['name']))
	header("location:admin_login.php");
?>

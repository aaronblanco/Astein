<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['name'] == "Admin") {
    
} else {

	header("location:admin_login.php");
}
?>

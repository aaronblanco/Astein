<?php
session_start();
session_unset($_SESSION['admin']);
session_destroy();
header("Location: admin_login.php");
?>

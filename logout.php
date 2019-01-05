<?php
session_start();
session_unset($_SESSION['name']);
session_destroy();
header("Location: admin_login");
?>

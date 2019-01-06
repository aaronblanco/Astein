<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  && $_SESSION['name'] == "Admin") {
    echo "Welcome to the member's area, " . $_SESSION['name'] . "!";
} else {
    echo "Please log in first to see this page.";
}
?>

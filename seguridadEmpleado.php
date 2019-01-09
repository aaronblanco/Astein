<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {

} else {

  
  echo "No tienes permiso para estar aquí";
}
?>

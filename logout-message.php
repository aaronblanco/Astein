<?php
echo '<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Logout – Administrador</title>
</head>
<body>
  <div id="main-content">
  <h1>Terminando sesión</h1>
  <p class="subtitle">Por favor, espere...</p>
  </div>
</body>
</html>';
sleep(2);
// header("Location: admin_login.php");
header( "refresh:1; url=admin_login.php" );
?>

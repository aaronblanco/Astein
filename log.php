<!DOCTYPE html>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
  <link rel="stylesheet" href="css\EstilosGenerales.css">
  <link rel="stylesheet" href="css\log.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

  <?php
    include "usuario_navbar.php";
  ?>

<h1>&nbsp;Log de reservas </h1>

<div id="main-content">
  <table id="tabla">

<tr>
  <td><strong>ID</strong></td>
  <td><strong>Fecha</strong></td>
  <td><strong>Oferta</strong></td>
  <td><strong>Nombre</strong></td>

  <td><strong>E-mail</strong></td>
  <td><strong>Teléfono</strong></td>
  <td><strong>Mensaje</strong></td>

</tr>

<tr>
  <td>00823636</td>
  <td>12/10/2018 15:34</td>
  <td>Digi 2000</td>
  <td>María López</td>
  <td>mlopez1995@gmail.com</td>
  <td>687336782</td>

</tr>

<tr>
  <td>00823637</td>
  <td>12/10/2018 18:34</td>
  <td>Digi 150</td>
  <td>José Gonzalez</td>
  <td>j.gonzal@gmail.com</td>
  <td>687336782</td>
  <td>Hola, este tarifa...</td>
</tr>

<tr>
  <td>00823638</td>
  <td>12/10/2018 22:12</td>
  <td>Digi 100</td>
  <td>Marta Garcia</td>
  <td>marta1992@gmail.com</td>
  <td>663162789</td>
</tr>
</table>


</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>

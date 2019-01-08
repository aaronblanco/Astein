<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Resultados de la búsqueda</title>
</head>
<body>
  <?php
  include "usuario_navbar.php";
  require 'connection.php';
  $type = $_GET['type'];
  $search = $_GET['search'];
  ?>
  <div id="main-content">
    <h1> Resultados de la búsqueda por <?php echo "tipo: '$type' y nombre: '$search'";?></h1>
  <a href="ofertas.php" target="_self"><i class="material-icons icon-arrow">keyboard_arrow_left</i>Volver</a>
<?php
    if($type === "Todos"){
      if($search === ""){
        $query_findOffer = $connection->prepare("SELECT * from offer");
      } else {
        $query_findOffer = $connection->prepare("SELECT * from offer where type is not null and name LIKE CONCAT('%', ?, '%')");
        $query_findOffer->bind_param("s", $search);
      }
    } else {
    if($search === ""){
      $query_findOffer = $connection->prepare("SELECT * from offer where type=?");
      $query_findOffer->bind_param("s", $type);
    } else {
      $query_findOffer = $connection->prepare("SELECT * from offer where type=? and name LIKE CONCAT('%', ?, '%')");
      $query_findOffer->bind_param("ss", $type, $search);
    }
  }
  $query_findOffer->execute();
  $result = $query_findOffer->get_result();
?>
  <table>
    <tr>
      <th>Código</th>
      <th>Nombre</th>
      <th>Proveedor</th>
      <th>Precio</th>
      <th style="width:33%; word-wrap: word-break">Descripción</th>
      </tr>
  <?php

      while($row = $result->fetch_assoc()){
      ?>
      <div class="offer">
           <a href="oferta_detalle.php?id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a>
           <p><?php echo $row['price']; ?></p>
       </div>
     <?php } ?>
 </div>
<?php include "usuario_footer.php"; ?>
</html>

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
  include "admin_navbar.php";
  include "connection.php";
  $type = $_GET['type'];
  $search = $_GET['search'];
  ?>
  <div id="main-content">
    <h1> Resultados de búsqueda</h1>
    <p class="subtitle"><?php echo "<b>Tipo:</b> '$type' <br><b>Nombre:</b> '$search'";?></p>
  <a href="admin_ofertas.php" target="_self"><i class="material-icons icon-back">keyboard_arrow_left</i></a>
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
      <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['provider']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['description']; ?></td>
      </tr>
      <?php } ?>
  </table>
</div>
<?php include "admin_footer.php"; ?>
</html>

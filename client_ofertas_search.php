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
  $type = strip_tags($_GET['type']);
  $search = strip_tags($_GET['search']);
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
  if(!$result || mysqli_num_rows($result) == 0 ){
    echo "<p>Su búsqueda no produjo ningún resultado.</p>";
    echo "<script>document.getElementById('result-table').style.display = 'none';</script>";
  } else {
?>

<div class="ofertas-container">
  <?php
  while($row = $result->fetch_assoc()){
    $image = $row["image"];
    $id = $row["id"];
    if($image!='') {
      echo '<div class="offer"><a href="oferta_detalle.php?id='.$id.'"><img alt="'.$row['name'].'" title="'.$row['name'].'" class="offer-image" src="data:image/jpeg;base64,'.base64_encode($image).'"/></a></div>';
    } else {
      $url = "'oferta_detalle.php?id=$id'";
      echo '<div class="offer-no-image-user-thumbnail" onclick="location.href='.$url.';">
        <p class="offer-headline-user-thumbnail">'.$row['name'].'<p>
        <p class="offer-price-user-thumbnail">'.$row['price'].'€'.'/'.$row['priceType'].'<p>
      </div>';
    }
  }
}
  ?>

  </div>
 </div>
<?php include "usuario_footer.php"; ?>
</html>

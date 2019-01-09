<!DOCTYPE html>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
  <link rel="stylesheet" href="css\EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>

  <?php
    include "usuario_navbar.php";
    include("user_feedback.php");
    require 'connection.php';
  ?>

  <div id="main-content">
  <h1>Ofertas</h1>
  <div class="astein-form" style="width:200px;">
    <select id="select">
      <option value="0">Todos</option>
      <option value="1">Particulares</option>
      <option value="2">Empresas</option>
    </select>
  <input type="text" id="search" placeholder="Buscar ofertas por nombre">
  <input type="submit" value="Buscar" onclick="setVars();">
</div>
<script>
function setVars(){
  var select = document.getElementById("select");
  var type = select.options[select.selectedIndex].text;
  var search = document.getElementById("search").value;
  window.location.href="client_ofertas_search.php?type=" + type + "&search=" + search;
}
</script>

<div class="ofertas-container">
  <?php
    $query = "SELECT * from offer";
    $result = $connection->query($query);

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
      } ?>

      </script>
  </div>
</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>

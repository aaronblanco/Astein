<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/oferta.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Oferta – Detalle</title>
</head>
<body>

  <?php
  include "usuario_navbar.php";
  require 'connection.php';
  session_start();

  $id = $_GET['id'];

  $query_getDetails = $connection->prepare("SELECT * from offer where id = ?");
  $query_getDetails->bind_param("i", $id);
  $query_getDetails->execute();
  $result = $query_getDetails->get_result();

  if(!$result || mysqli_num_rows($result) == 0 ){
    echo "Esta oferta no existe.";
    $_SESSION["message-warning"] = "Esta oferta no existe.";
    header("Location: ofertas.php");
  }

  $row = $result->fetch_assoc();
  $id = $row["id"];
  $name = $row["name"];
  $price = $row["price"];
  $priceType = $row["priceType"];
  $provider = $row["provider"];
  $type = $row["type"];
  $data = $row["data"];
  $dataUnit = $row["dataUnit"];
  $calls = $row["calls"];
  $fiber = $row["fiber"];
  $description = $row["description"];
  $image = $row["image"];
  ?>

<div id="main-content">

<h1><?php echo $name ?></h1><br>

<a href="ofertas.php"><i class="material-icons icon-back">keyboard_arrow_left</i></a>
<br>
<?php
if($image!='') {
  echo '<img title="'.$name.'" alt="'.$name.'" class="offer-image-admin offer-image-user" src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
} else {
  echo '<br>';
}
echo "<div id='user-offer-info'>";
echo "<p><b>Precio:</b> $price"."€/$priceType</p>";
echo "<p><b>Proveedor:</b> $provider</p>";
echo "<p><b>Tipo:</b> $type</p>";

if ($data == '99999') {
  echo "<p><b>Datos:</b> ilimitados </p>";
} elseif ($data == '0') {
} else {
  echo "<p><b>Datos:</b> $data $dataUnit </p>";
}

if ($calls == '99999') {
  echo "<p><b>Llamadas:</b> ilimitadas </p>";
} elseif ($calls == '0') {
} else {
  echo "<p><b>Llamadas:</b> $calls minutos</p>";
}

if ($fiber != '0') {
  echo "<p><b>Fibra:</b> $fiber Mb </p>";
}

if($description != '') {
  echo "<p><b id='offer-description'>Descripción:</b> <p id='offer-description'>$description</p></p>";
}
echo "</div>";
?>

<button type="button" class="submit_button" onclick="location.href='solicitar.php?id=<?php echo $id?>'" class="navtab">Solicitar</button>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>

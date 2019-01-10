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
  echo '<img class="offer-image-admin offer-image-user" src="data:image/jpeg;base64,'.base64_encode($image).'"/>';
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
<h2><?php echo $row['name'];?></h2>
<table>
  <tr>
    <td>Precio</td>
    <td><?php echo $row['price']; echo '€/'; echo $row['priceType']?></td>
  </tr>
  <tr>
    <td>Datos</td>
    <td><?php if(empty($row['data'])){echo "/";} echo $row['data']; echo " "; echo $row['dataUnit'];?></td>
  </tr>
  <tr>
    <td>Proveedor</td>
    <td><?php echo $row['provider'];?></td>
  </tr>
  <tr>
    <td>Llamadas</td>
    <td><?php if (!empty($row['calls'])){echo $row['calls']; echo ' Minutos';}else{echo "/";}?></td>
  </tr>
  <tr>
    <td>Fibra</td>
    <td><?php if (!empty($row['fiber'])){echo $row['fiber']; echo ' GB';}else{echo "/";}?></td>
  </tr>
  <tr>
    <td>Descripción</td>
    <td style="width:70%; word-wrap: word-break"><?php if (!empty($row['description'])){echo $row['description'];}else{echo "Lo sentimos, no hay descripción. Si tienes alguna duda, pregúntanos!";}?></td>
  </tr>
</table>
<div class="offer_photo_container">
  <img src="<?php echo $row['photo']?>">
</div>

<button type="button" class="submit_button" onclick="location.href='solicitar.php?id=<?php echo $id?>'" class="navtab">Solicitar</button>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>

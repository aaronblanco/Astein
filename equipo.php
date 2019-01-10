<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link rel="stylesheet" href="css/equipo.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Nuestro equipo</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
    require 'connection.php';
  ?>

<div id="main-content">

<h1>Nuestro equipo</h1>
<div id="container-desktop">
  <table id="employee-table">
    <?php
    $query = "SELECT id, firstname, lastname, activity, description, image from employee";
    $result = $connection->query($query);
      while($row = $result->fetch_assoc()){
      ?>
    <tr>
    <td>
      <figure>
        <?php
        if($row["image"]!='') {
          echo '<img alt="'.$row['firstname'].' '.$row['lastname'].'" title="'.$row['firstname'].' '.$row['lastname'].'" class="employee-image employee-desktop" src="data:image/jpeg;base64,'.base64_encode($row["image"]).'"/>';
        } else {
          echo '<img alt="'.$row['firstname'].' '.$row['lastname'].'" title="'.$row['firstname'].' '.$row['lastname'].'" class="employee-image employee-desktop" src="images/profile_icon.png">';
        }
        ?>
      </figure>
    </td>
      <td><div class="employee-list-name"><?php echo $row['firstname']; echo " "; echo $row['lastname'];?></div><?php echo $row['activity'];?><br><br><?php echo $row['description']?></td>
    </tr>
  <?php } ?>
</table>
</div>

<div id="container-mobile">
    <?php
    $query = "SELECT id, firstname, lastname, activity, description, image from employee";
    $result = $connection->query($query);
      while($row = $result->fetch_assoc()){
        if($row["image"]!='') {
          echo '<div class="employee-div"><div class="employee-image-div"><img alt="'.$row['firstname'].' '.$row['lastname'].'" title="'.$row['firstname'].' '.$row['lastname'].'" class="employee-image image-mobile" src="data:image/jpeg;base64,'.base64_encode($row["image"]).'"/></div>';
        } else {
          echo '<div class="employee-div"><div class="employee-image-div"><img alt="'.$row['firstname'].' '.$row['lastname'].'" title="'.$row['firstname'].' '.$row['lastname'].'" class="employee-image image-mobile" src="images/profile_icon.png"></div>';
        }
      ?>
      <div class="employee-info-div">
        <div class="employee-list-name"><?php echo $row['firstname']; echo " "; echo $row['lastname'];?></div>
        <div><?php echo $row['activity'];?></div><br>
        <div><?php echo $row['description']?></div>
    </div>
  </div>
  <?php } ?>
</table>
</div>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>

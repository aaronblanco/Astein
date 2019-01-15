<!DOCTYPE html>
<html>
<head>
  <?php require 'meta_tags.php'; ?>
  <link rel="stylesheet" href="css/EstilosGenerales.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="icon" href="images\astein_icon.png"/>
  <title>Contacta con nosotros – Astein</title>
</head>
<body>

  <?php
    include "usuario_navbar.php";
    require 'connection.php';

    $company_id = 1;
    $query_findCompany = "SELECT * from company where ID='$company_id'";
    $result = $connection->query($query_findCompany);
    if(mysqli_num_rows($result) > 0 ){
      $row = $result->fetch_assoc();
      $phone = $row['phone'];
      $address = $row['address'];
      $email = $row['email'];
    } else {
        printf("No hay ninguna empresa en la base de datos. </br> Error: %s\n", $connection->error);
    }
  ?>

<div id="main-content">
  <h1> Contacta con nosotros </h1>

<div class="map-responsive">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3191.573428477337!2d-2.4418152488259004!3d36.87662807099434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7a9e4815b768b9%3A0xd7da0b3b9a1ad95b!2zQ3RyYS4gQWxtZXLDrWEsIDg2LCBPZmljaW5hIDUsIDA0MjMwIEh1w6lyY2FsIGRlIEFsbWVyw61hLCBBbG1lcsOtYQ!5e0!3m2!1ses!2ses!4v1542121839201" width="600" height="450" style="border:0" allowfullscreen></iframe>
</div>

<br>

<div class="contact-info"><i class="material-icons icon-black icon-contacta">location_on</i><?php echo $address ?></div>
<div class="contact-info"><i class="material-icons icon-black icon-contacta">phone</i><a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></div>
<div class="contact-info"><i class="material-icons icon-black icon-contacta">email</i><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></div>

</div>

<?php
  include "usuario_footer.php";
?>

</body>
</html>

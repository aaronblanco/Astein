<?php
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

<div id="footer-desktop">
  <div class="footer">
    <a class="social-media" href="https://www.facebook.com/"><img alt="icono de facebook" class="social-media-icon" src="images/facebook_icon.png"></a>
    <a class="social-media" href="https://www.instagram.com/"><img alt="icono de instagram" class="social-media-icon" src="images/instagram_icon.png"></a>
    <i class="material-icons icon-white footer-icon-action" onClick="window.location='aviso.php'">info</i>
    <p class="footer-text"><a href="aviso
      .php" class="white-link">aviso legal</a></p>
    <i class="material-icons icon-white footer-icon-action" onClick="window.location='admin_inicio.php'">build</i>
    <p class="footer-text"><a href="admin_login.php" class="white-link">página de administrador</a></p>
  </div>
  <div id="footer-right">
    <i class="material-icons icon-white footer-icon-action" onClick="window.location='tel:<?php echo str_replace(' ', '', $phone); ?>'">phone</i>
    <p class="footer-text"><a href="tel:<?php echo str_replace(' ', '', $phone); ?>" class="white-link"><?php echo $phone ?></a></p>
    <i class="material-icons icon-white footer-icon-action" onClick="window.location='mailto:<?php echo $email ?>'">email</i>
    <p class="footer-text"><a href="mailto:<?php echo $email ?>" class="white-link"><?php echo $email ?></a></p>
  </div>
</div>

<div id="footer-mobile">
  <div class="footer centered-footer">
    <a class="social-media" href="https://www.facebook.com/astein.telecomunicaciones.54"><img alt="icono de facebook" class="social-media-icon mobile-icon" src="images/facebook_icon.png"></a>
    <a class="social-media" href="https://www.instagram.com/asteintelecomunicaciones/"><img alt="icono de instagram" class="social-media-icon mobile-icon" src="images/instagram_icon.png"></a>
    <p class="footer-text"><a href="aviso.php" class="white-link link-margin mobile-aviso-legal">aviso legal</a></p>
    <i class="material-icons icon-white footer-icon-action mobile-icon" onClick="window.location='admin_inicio.php'">build</i>
    <i class="material-icons icon-white footer-icon-action mobile-icon" onClick="window.location='tel:<?php echo str_replace(' ', '', $phone); ?>'">phone</i>
    <i class="material-icons icon-white footer-icon-action mobile-icon" onClick="window.location='mailto:<?php echo $email ?>'">email</i>
  </div>
</div>

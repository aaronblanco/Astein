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
    <a class="social-media" href="https://www.facebook.com/"><img alt="Facebook" class="social-media-icon" src="images/facebook_icon.png"></a>
    <a class="social-media" href="https://www.instagram.com/"><img alt="Instagram" class="social-media-icon" src="images/instagram_icon.png"></a>
    <i class="material-icons icon-white footer-icon-action" onClick="window.location='index.php'">person</i>
    <p class="footer-text"><a href="index.php" class="white-link">página de usuario</a></p>
  </div>
  <div id="footer-right">
    <i class="material-icons icon-white footer-icon">phone</i>
    <p class="footer-text"><?php echo $phone ?></p>
    <i class="material-icons icon-white footer-icon">email</i>
    <p class="footer-text"><?php echo $email ?></p>
  </div>
</div>

<div id="footer-mobile">
  <div class="footer centered-footer">
    <a class="social-media" href="https://www.facebook.com/astein.telecomunicaciones.54"><img alt="Facebook" class="social-media-icon mobile-icon" src="images/facebook_icon.png"></a>
    <a class="social-media" href="https://www.instagram.com/asteintelecomunicaciones/"><img alt="Instagram" class="social-media-icon mobile-icon" src="images/instagram_icon.png"></a>
    <i class="material-icons icon-white footer-icon-action mobile-icon" onClick="window.location='index.php'">person</i>
    <i class="material-icons icon-white footer-icon-action mobile-icon" onClick="window.location='tel:<?php echo $phone ?>'">phone</i>
    <i class="material-icons icon-white footer-icon-action mobile-icon" onClick="window.location='mailto:<?php echo $email ?>'">email</i>
  </div>
</div>

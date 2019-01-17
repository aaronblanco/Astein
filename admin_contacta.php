  <!DOCTYPE html>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/EstilosGenerales.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Equipo – Administrador</title>
  </head>
  <body>

    <?php
      require 'seguridad.php'; // Acceso solo para el admin
      include('admin_navbar.php');
      include("user_feedback.php");
      require 'connection.php';

      $company_id = 1;
      $query_findCompany = "SELECT * from company where ID='$company_id'";
      $result = $connection->query($query_findCompany);
      if(mysqli_num_rows($result) > 0 ){
        $row = $result->fetch_assoc();
        $phone = $row['phone'];
        $address = $row['address'];
        $email = $row['email'];
        //echo($email.$phone.$address)
      } else {
        write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                     "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                     ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                     $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                     $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                     $_SERVER['REQUEST_URI']. "\nError en consultar datos de la empresa.","ERROR");
          printf("No hay ninguna empresa en la base de datos. </br> Error: %s\n", $connection->error);

      }
      ?>

  <div id="main-content">

    <h1>Contacta con nosotros</h1>
    <p class="subtitle">Aquí puede cambiar las informaciones de contacto de la empresa.</p>

  <div id="contact-info-form">
    <form class="astein-form" action="admin_edit_contact_info_process.php" method="post">
      <label for= "lab1">Teléfono</label> <input type="tel" class="astein-input" name="phone" id="lab1" value="<?php echo $phone ?>" required><br>
      <label for= "lab2">Dirección</label> <input type="text" class="astein-input" name="address" id="lab2" value="<?php echo $address ?>" required><br>
      <label for = "lab3">Correo electrónico</label> <input type="email" class="astein-input" name="email" id="lab3" value="<?php echo $email ?>" required><br>
      <input type="hidden" id="company_id" name="company_id" value="<?php echo $company_id ?>">
      <input class="save-changes" type="submit" action="saved_changes.php" method="post" value="guardar cambios">
    </form>
  </div>

  </div>

  <?php
    include "admin_footer.php";
  ?>

  </body>
  </html>

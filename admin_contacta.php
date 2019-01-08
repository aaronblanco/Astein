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
        printf("No hay ninguna empresa en la base de datos. </br> Error: %s\n", $connection->error);
    }
    ?>

<div id="main-content">

  <h1>Contacta con nosotros</h1>
  <p class="subtitle">Aquí puede cambiar las informaciones de contacto de la empresa.</p>

<div id="contact-info-form">
  <form class="astein-form" action="admin_edit_contact_info_process.php" method="post">
    <label>Teléfono</label> <input type="text" class="astein-input" name="phone" value="<?php echo $phone ?>" required><br>
    <label>Dirección</label> <input type="text" class="astein-input" name="address" value="<?php echo $address ?>" required><br>
    <label>Correo electrónico</label> <input type="text" class="astein-input" name="email" value="<?php echo $email ?>" required><br>
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

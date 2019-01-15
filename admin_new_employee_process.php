<?php
require 'seguridad.php'; // Acceso para el admin
require 'connection.php';
require 'log_funcion.php'; // --> Enable logging

header('Content-type: text/plain; charset=utf-8');

$email = strip_tags($_POST['email']);
$name = strip_tags($_POST['name']);
$lastname = strip_tags($_POST['lastname']);
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
  $query_findEmployee = "SELECT * from employee where email='$email'";
  $result = $connection->query($query_findEmployee);
  if(!$result || mysqli_num_rows($result) == 0 ){
    if($addEmployee = $connection->prepare("INSERT INTO employee (email, firstname, lastname) values (?, ?, ?)")) {
      $addEmployee->bind_param("sss", $email, $name, $lastname);
      $addEmployee->execute();
      $addEmployee->close();
      write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                   "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                   ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                   $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                   $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                   $_SERVER['REQUEST_URI']. "\nNuevo empleado $firstname $lastname con correo electrónico $email insertado.","INFO");

      $_SESSION["message-success"] = "Nuevo empleado $name $lastname creado.";
      header("Location: admin_equipo.php");
    } else {
      printf("Error: %s\n", $connection->error);
      write_log("IP: ".$_SERVER['REMOTE_ADDR']." - ".$_SERVER['HTTP_X_FORWARDED_FOR'].
                                   "\nHTTP_HOST: ".$_SERVER['HTTP_HOST']."\nHTTP_REFERER:
                                   ".$_SERVER['HTTP_REFERER']."\nHTTP_USER_AGENT: ".
                                   $_SERVER['HTTP_USER_AGENT']."\nREMOTE_HOST: ".
                                   $_SERVER['REMOTE_HOST']."\nREQUEST_URI: ".
                                   $_SERVER['REQUEST_URI']. "\nError en crear nuevo empleado.","ERROR");

    }
  } else {
    $_SESSION["message-info"] = "Existe ya un empleado con email $email.";
    header("Location: admin_nuevo_empleado.php");
  }
}

?>

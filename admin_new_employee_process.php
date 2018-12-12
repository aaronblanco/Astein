<?php
include("connection.php");
if ($connection->connect_error){
  die("Connection failed: " . $connection->connect_error);
}

$email = $_POST['email'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];

$query_findEmployee = "SELECT * from employee where email='$email'";
$result = $connection->query($query_findEmployee);
if(!$result || mysqli_num_rows($result) == 0 ){
  if($addEmployee = $connection->prepare("INSERT INTO employee (email, name, lastname) values (?, ?, ?)")) {
    $addEmployee->bind_param("sss", $email, $name, $lastname);
    $addEmployee->execute();
    $addEmployee->close();
    header("Location: admin_equipo.php");
  } else {
    printf("Error: %s\n", $connection->error);
  }
} else {
  echo "Este empleado ya existe.";
  header( "refresh:1; url=admin_nuevo_empleado.php" );
}
?>

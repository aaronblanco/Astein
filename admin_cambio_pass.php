<?php
include(safeConnection.php);
include(funciones.php);
$servidor = "localhost";
$baseDatos = "prueba";
$usuario = "root";
$clave = "";
conecta_bd($bd, $servidor, $baseDatos, $usuario, $clave);
$pass = $_POST['password'];
function cambio_pass(&$bd, $pass)
if($connection->query($query)){
	header("Location: admin_contrasena.php");
function cierra_bd ($bd);
} else {
	echo "Failue";
}
 ?>

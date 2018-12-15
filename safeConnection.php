<?php
// Esto es una libreria de funciones para el acceso a la base de datos
//funcion para conectar
function conecta_bd(&$bd, $servidor, $baseDatos, $usuario, $clave){ //&bd = Es una variable que por ella hacemos referencia al valor de al funcion que esta fuera
try{
$bd = new PDO('mysql:host=' . $servidor . ';dbname=' . $baseDatos,
				$usuario, $clave,
				array(PDO::ATTR_PERSISTENT => true,
					  PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8') );
} catch (PDOException $e) {
	die ("ERROR: <br />".$e ->getMessage ()."<br />");
}
}
//cierra la base de datos
function cierra_bd (&$bd){
	$bd = null;
}
?>

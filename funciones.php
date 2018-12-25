<?php
function muestra_ciudad(&$bd,$tabla) {
    $consulta = "SELECT * FROM $tabla";
    $resultado = $bd->prepare($consulta);
    $resultado->execute();
    while( $fila = $resultado->fetch() ) {
        echo "El id es ".$fila['IdCiudad']." y el nombre es ".$fila['Nombre']."<br />";
    }
}
function inserta_ciudad(&$bd,$id,$nombre) {
    $consulta = "INSERT INTO ciudades(IdCiudad, Nombre) VALUES (:id,:nombre)";
    $resultado = $bd->prepare($consulta);
    $resultado -> bindValue ("nombre", $nombre);
    $resultado -> bindValue ("id", $id);
    $resultado -> execute();
}
function borra_ciudad(&$bd,$nombreborra) {
    $consulta = "DELETE FROM ciudades WHERE nombre = :nombre";
    $resultado = $bd->prepare($consulta);
    $resultado -> bindValue ("nombre", $nombreborra);
    $resultado -> execute();
}
function cambio_pass(&$bd, $pass) {
    $consulta = "UPDATE `ciudades` SET `Nombre` = :nombrecambia WHERE `ciudades`.`IdCiudad` = :idcambia;";
    $resultado = $bd->prepare($consulta);
    $resultado -> bindValue ("idcambia", $idcambia);
    $resultado -> bindValue ("nombrecambia", $nombrecambia);
    $resultado -> execute();
    }
    function ultimo_id(&$bd) {
        $consulta = "select max(IdCiudad) from ciudades";
        $resultado = $bd->prepare($consulta);
        $resultado->execute();
        $fila = $resultado->fetch();
        $numero = $fila["max(IdCiudad)"];
        $resultado->closecursor();
        return ($numero);
    }
function a�adir_ciudad_for(&$bd) {
    $ulid = ultimo_id($bd);
    $ulid+=1;
    print_r ($ulid);
    $consulta = "INSERT INTO ciudades VALUES (:id,:nombre)";
    $resultado = $bd->prepare($consulta);
    $resultado -> bindValue ("id", $ulid);
    $resultado -> bindValue ("nombre", $_POST['ciudad']);
    $resultado -> execute();
}
?>
<?php
	if (!isset($_POST["usuario"]) or !isset($_POST["pass"]))
	if (isset($_POST["usuario"] ) && $_POST["usuario"] == "Roberto") {
	header("Location: bienvenido.php");
	}
?>

<?php
session_start ();
if (!isset($_POST["usuario"]) or empty($_POST["usuario"]))
	if (!isset($_POST["password"]) or empty ($_POST["password"]))
		header ("Location: login.php?fallo=ambos");
	else
		header ("Location: login.php?fallo=usuario");
else
	if (!isset($_POST["password"]) or empty ($_POST["password"]))
		header ("Location: login.php?fallo=password");
	else
		if $_POST["usuario"]=="Roberto" && $_POST["pass"]=="123"){
			$_SESSION ["nombre"]= $_POST["usuario"];
			header ("Location: bienvenido.php");
		}
		else
			header ("Location: login.php?fallo=incorrectos");
?>

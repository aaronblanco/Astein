<?php
function cambio_pass($bd, $pass) {
    $consulta = "UPDATE `administrator` SET `password` = :pass ";
    $resultado = $bd->prepare($consulta);
    $resultado -> bindValue ("pass", $pass);
    $resultado -> execute();
    }





?>

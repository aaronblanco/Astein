<?php

function write_log($cadena,$tipo)
{
 $arch = fopen(realpath( '.' )."/logs/log_".date("Y-m-d").".txt", "a+");

 fwrite($arch, "[".date("Y-m-d H:i:s.u")." ".$_SERVER['REMOTE_ADDR']." ".
                  $_SERVER['HTTP_X_FORWARDED_FOR']." - $tipo ] ".$cadena."\n");
 fclose($arch);
}

?>

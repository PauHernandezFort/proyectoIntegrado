<?php
require_once "autoloader.php"; 

$power = new Power("Escudo de Hielo"); 
$htmlListaPoderes = $power->drawList(); 


echo $htmlListaPoderes;


?>

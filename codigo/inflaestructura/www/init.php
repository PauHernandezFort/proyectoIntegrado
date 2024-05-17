<?php
require_once "autoloader.php"; 

$power = new Power(""); 
$htmlListaPoderes = $power->drawList(); 


echo $htmlListaPoderes;


?>

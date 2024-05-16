<?php
require_once "autoloader.php"; 

$power = new Power("Escudo de Hielo"); 
$conn = $power->getConn();
$power->drawList(); 
echo $power;




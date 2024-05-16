<?php
require_once "autoloader.php"; 

$power = new Power("Fuego Ardiente"); 
$conn = $power->getConn();
$power->drawList(); 
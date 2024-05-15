<?php
require_once "autoloader.php"; 

$person = new Character("guerrero"); 
$conn = $person->getConn();
$person->init(); 
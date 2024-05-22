<?php
    $acciones = json_decode(urldecode($_GET['array']), true);
    var_dump($acciones); 
    $ganador=$_GET['ganador'];
    echo $ganador;
   
    

    
?>
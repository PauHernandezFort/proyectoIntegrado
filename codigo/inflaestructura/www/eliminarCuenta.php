<?php
$correo = $usuario = $_COOKIE['correo'];
    require_once 'autoloader.php';
    $conexion = new Connection;
    echo $correo;
    $sql = "DELETE FROM `Cuenta` WHERE 'correo' = '$correo'";
    $conn = $conexion->getConn();
    $result = mysqli_query($conn, $sql);
    var_dump($result);
 

?>
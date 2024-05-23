<?php

require_once "autoloader.php";

$conexion = new Connection();


function drawlist($conn, $idBatalla) {
    $sql5 = "SELECT * from BatallaDetalle Where idBatalla = $idBatalla"
    $result = $conn->query($sql5);
    $batallas = [];
    while ($row = $result->fetch_assoc()) {
        $batallas[] = [
            'id' => $row['id'],
            'idBatalla' => $row['idBatalla'],
            'nombrePoder' => $row['nombrePoder'],
            'nombrePersonaje' => $row['nombrePersonaje'],
            'Daño' => $row['Daño'],
            'Energia' => $row['energia']
        ];
    }

    return $batallas;
}

$conn = $connection->getConn();

$jugadorCorreo = $_COOKIE["correo"];
$sql3 = "SELECT nombre FROM Personaje WHERE correoCuenta = '$jugadorCorreo'";
$resultado = $conn->query($sql3);

$batallas = [];
if ($resultado && $resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $nombrePersonaje = $row['nombre'];
    $batallas = drawlist($conn, $nombrePersonaje);
} 

?>
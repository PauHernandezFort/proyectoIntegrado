<?php
require_once 'autoloader.php';
$conexion = new Connection;
$nombrePoder = $_POST["nombrePoder"];
$daño = $_POST["daño"];
$coste = $_POST["coste"];
$descripcion = $_POST["descripcion"];

$query = "INSERT INTO Poder (nombrePoder, daño, coste, descripcion) 
VALUES ('$nombrePoder', '$daño', '$coste', '$descripcion')";
$conn = $conexion->getConn();
$result = mysqli_query($conn, $query);
header("location: home.php");
?>
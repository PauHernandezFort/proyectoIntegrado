<?php
require_once "autoloader.php";
$conexion = new Connection;
$conn = $conexion->getConn();

session_start();
    $acciones = json_decode(urldecode($_GET['array']), true);
    $ganador=$_GET['ganador'];
 
   
   $jugador1 = $_COOKIE["correo"];
   $jugador2 = $_SESSION["email"];

    if ( $ganador == "Jugador1"){
        $jugaganador = $jugador1;
    }else{
        $jugaganador = $jugador2;
    }
 
$query =  "INSERT INTO `Batalla`( `ganador`) VALUES ('$jugaganador')";
$resultado = mysqli_query($conn, $query);


$sql = "SELECT id FROM `Batalla` ORDER BY id DESC LIMIT 1 ";
$result = mysqli_query($conn, $sql);
$resultado = mysqli_fetch_assoc($result);
$idBatalla = $resultado['id'];


$nombrePoderes = [];
$nombreJugadores = [];
$daños = [];
$energias = [];

foreach($acciones as $action) {
    $nombrePoderes[] = $action[0];
    $nombreJugadores[] = $action[1];
    $daños[] = $action[2];
    $energias[] = $action[3];
    
}


$id = 0;
$sql3 = "SELECT nombre FROM Personaje WHERE correoCuenta = '$jugador1'";
$result = mysqli_query($conn, $sql3);
$resultado = mysqli_fetch_assoc($result);
$nombrePersonaje1 = $resultado['nombre'];

$sql3 = "SELECT nombre FROM Personaje WHERE correoCuenta = '$jugador2'";
$result = mysqli_query($conn, $sql3);
$resultado = mysqli_fetch_assoc($result);
$nombrePersonaje2 = $resultado['nombre'];


$i=0;
$id=0;
foreach ($acciones as $action) {
    $nombrePoder = mysqli_real_escape_string($conn, $action[0]);
   
    $daño = $action[2];
    $energia = $action[3];
    $id++;
    
    if($nombreJugadores[$i] == 1){
        $nombrePersonaje = $nombrePersonaje1;
    }else{
        $nombrePersonaje = $nombrePersonaje2;
    }
    $sql2 = "INSERT INTO `BatallaDetalle`( `id`,`idBatalla`, `nombrePoder`, `nombrePersonaje`, `daño`, `energia`)
             VALUES ( '$id','$idBatalla', '$nombrePoder', '$nombrePersonaje', '$daño', '$energia')";
    $resultado2 = mysqli_query($conn, $sql2);
    
    if (!$resultado2) {
        echo "Error: " . mysqli_error($conn);
    }
    $i++;
}

$sql4 = "INSERT INTO `BatallaPersonaje`(`idbatalla`, `nombrePersonaje`) VALUES ('$idBatalla','$nombrePersonaje1')";
    $resultado2 = mysqli_query($conn, $sql4);
  
    $sql4 = "INSERT INTO `BatallaPersonaje`(`idbatalla`, `nombrePersonaje`) VALUES ('$idBatalla','$nombrePersonaje2')";
    $resultado2 = mysqli_query($conn, $sql4);
 

    header("Location: sumarPuntos.php?jugadorGanador=$jugaganador");
?>
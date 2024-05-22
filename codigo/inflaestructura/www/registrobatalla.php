<?php

require_once("autoloader.php");
$connection = new Connection();

function drawlist($conn, $nombrePersonaje, ) {
    $sql5 = "SELECT b.*
    FROM Batalla b
    JOIN BatallaPersonaje bp ON b.id = bp.idbatalla
    WHERE bp.nombrePersonaje = '$nombrePersonaje'";
$result = $conn->query($sql5);

    $batallas = [];
    while ($row = $result->fetch_assoc()) {
        $batallas[] = [
            'id' => $row['id'],
            'Fecha' => $row['fecha'],
            'Ganador' => $row['ganador']
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Batallas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
    

body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #1c1c1c; 
    color: #fff; 
}

h1 {
    color: #00bfff; 
}

.batalla {
    width: 150px; 
    margin: 0 10px 15px 0; 
    padding: 10px;
    border: 1px solid #333; 
    border-radius: 5px;
    background-color: #333; 
    float: left; 
    box-sizing: border-box; 
}

.batalla p {
    margin: 5px 0; 
    color: #fff; 
}

.batalla strong {
    font-weight: bold; 
    color: #00bfff; 
}





    </style>
</head>
<body>
    <h1>Historial de Batallas</h1>
    <body id="main_body">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">      
            <a class="navbar-brand" href="home.php">
                <img src="logo.jpeg" alt="Avatar Logo" class="d-inline-block align-top" style="height: 40px;">
            </a>
        </div>
    </nav>
    <?php foreach ($batallas as $batalla): ?>
        <div class="batalla">
            <p><strong>ID Batalla:</strong> <?php echo $batalla['id']; ?></p>
            <p><strong>Fecha:</strong> <?php echo $batalla['Fecha']; ?></p>
            <p><strong>Ganador:</strong> <?php echo $batalla['Ganador']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>


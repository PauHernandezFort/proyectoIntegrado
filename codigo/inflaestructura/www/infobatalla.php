<?php

require_once "autoloader.php";

$conexion = new Connection();

function drawlist($conn, $idBatalla, $NBatalla) {
    $sql5 = "SELECT * from BatallaDetalle Where idBatalla = $idBatalla";
    $result = $conn->query($sql5);

    $batallas = [];
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        
        if($count %2 ==0){
            $colorClass= 'bg-secondary';
        }else{
            $colorClass = 'bg-success';
        }
        echo "
            <div class='col-sm-4 mb-3'> <!-- Añadido mb-3 para evitar que las tarjetas se muevan -->
                <div class='batalla card $colorClass text-white'>
                    <div class='card-body'>
                        <h2 class='card-title'>Turno: {$row['id']}</h2>
                        <p class='card-text'>Número de Batalla: $NBatalla</p>
                        <p class='card-text'>Nombre del Poder: {$row['nombrePoder']}</p>
                        <p class='card-text'>Nombre del Personaje: {$row['nombrePersonaje']}</p>
                        <p class='card-text'>Daño: {$row['daño']}</p>
                        <p class='card-text'>Energía: {$row['energia']}</p>
                    </div>
                </div>
            </div>";
            $count++;
    }

    return $batallas;
}

$conn = $conexion->getConn();

$idBatalla = $_GET['id'];
$NBatalla = $_GET['NBatalla'];

$sql3 = "SELECT id FROM Batalla WHERE id = '$idBatalla'";
$resultado = $conn->query($sql3);

$batallas = [];
if ($resultado && $resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $nombrePersonaje = $row['id'];
    $batallas = drawlist($conn, $idBatalla, $NBatalla);
} 

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Batallas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <meta name="theme-color" content="#343a40">

    <style>
            body {
            font-family: 'Press Start 2P', cursive;
            margin: 20px;
            background-color: #1c1c1c;
            color: #fff;
            background-image: url('/img/temploregistro.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            padding-top: 56px; 
        }

        .batalla {
            font-size: 14px; 
            width: 180px;
            margin: 0 10px 15px 0;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            color: #fff;
            float: left;
        }

        .batalla p {
            margin: 5px 0;
            color: #fff;
            font-size: 12px; 
        }

        h1{
            color:red;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="logo.jpeg" alt="Avatar Logo" class="d-inline-block align-top" style="height: 40px;">
            </a>
            <a style="text-align: center; width: 100%;"><h1>PoketGame</h1></a>
        </div>
    </nav>
    <br>
    <div class="container">
       
        <br>
        <div class="row">
    <?php foreach ($batallas as $batalla): ?>
        <div class="col-sm-4"> 

            <div class="batalla">
                <p>ID : <?php echo $batalla['id']; ?></p>
                <p>Numero Batalla <?php echo $batalla['NBatalla']; ?></p>
                <p>nombre Poder:<?php echo $batalla['nombrePoder']; ?></p>
                <p>nombre Jugador: <?php echo $batalla['nombrePersonaje']; ?></p>
                <p>Daño: <?php echo $batalla['Daño']; ?></p>
                <p>Energia: <?php echo $batalla['Energia']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

        </div>
    </div>
</body>
</html>
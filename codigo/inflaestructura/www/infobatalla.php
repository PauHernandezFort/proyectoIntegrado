<?php

require_once "autoloader.php";

$conexion = new Connection();

function drawlist($conn, $idBatalla, $NBatalla) {
    $sql5 = "SELECT * from BatallaDetalle Where idBatalla = $idBatalla";
    $result = $conn->query($sql5);

    $batallas = [];
    while ($row = $result->fetch_assoc()) {
        echo "
            <div>
                <h1>Id: {$row['id']}</h1>
                <h1>Número de Batalla: $NBatalla</h1>
                <h1>Nombre del Poder: {$row['nombrePoder']}</h1>
                <h1>Nombre del Personaje: {$row['nombrePersonaje']}</h1>
        <h1>Daño: {$row['daño']}</h1>
        <h1>Energía: {$row['energia']}</h1>
            </div>";
       
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            margin: 20px;
            background-color: #1c1c1c;
            color: #fff;
            background-image: url('escenarioRegistro.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            padding-top: 56px; 
        }

        h1 {
            color: red;
        }

        #titulo {
            color: #00bfff;
        }

        .batalla {
            width: 180px;
            margin: 0 10px 15px 0;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #333;
            float: left;
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }

        .batalla:hover {
            transform: scale(1.35);
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
        <h1 id="titulo" class="text-center">Historial de Batallas</h1>
        <br>
        <div class="row">
    <?php foreach ($batallas as $batalla): ?>
        <div class="col-sm-4"> 
            
            <div class="batalla">
                <p><strong>ID :</strong> <?php echo $batalla['id']; ?></p>
                <p><strong>Numero Batalla</strong> <?php echo $batalla['NBatalla']; ?></p>
                <p><strong>nombre Poder:</strong> <?php echo $batalla['nombrePoder']; ?></p>
                <p><strong>nombre Jugador:</strong> <?php echo $batalla['nombrePersonaje']; ?></p>
                <p><strong>Daño:</strong> <?php echo $batalla['Daño']; ?></p>
                <p><strong>Energia:</strong> <?php echo $batalla['Energia']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

        </div>
    </div>
</body>
</html>


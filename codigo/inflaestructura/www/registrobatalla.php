<?php
require_once("autoloader.php");
$connection = new Connection();

function drawlist($conn, $nombrePersonaje) {
    $sql5 = "SELECT b.*
    FROM Batalla b
    JOIN BatallaPersonaje bp ON b.id = bp.idbatalla
    WHERE bp.nombrePersonaje = '$nombrePersonaje'";
    $result = $conn->query($sql5);

    $batallas = [];
    while ($row = $result->fetch_assoc()) {
        $batallas[] = $row; // Agregar la fila al array de batallas
    $i = 1;
   
    while ($row = $result->fetch_assoc()) {
        echo "
            <div>
                <h1>Id: {$row['id']}</h1>
                <h1>Fecha: {$row['fecha']}</h1>
                <h4>Ganador: {$row['ganador']}</h4>
                <a href='infoBatalla.php?id={$row['id']}&NBatalla=$i' class='btn btn-primary'>Info</a>
            </div>";
        $i++;
    }
    
    
return $batallas;
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
    border: none;
    border-radius: 10px;
    background-color: #444;
    float: left;
    box-sizing: border-box;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.batalla:hover {
    transform: scale(1.15);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
<<<<<<< HEAD
            <?php foreach ($batallas as $batalla): ?>
                <div class="col-sm-3"> 
                    <div class="batalla">
                        <p><strong>ID Batalla:</strong> <?php echo $batalla['id']; ?></p>
                        <p><strong>Fecha:</strong> <?php echo $batalla['fecha']; ?></p>
                        <p><strong>Ganador:</strong> <?php echo $batalla['ganador']; ?></p>
                        <a href='infoBatalla.php?id=<?php echo $batalla['id']; ?>' class='btn btn-primary'>Info</a>
                    </div>
                </div>
            <?php endforeach; ?>
=======
    <?php foreach ($batallas as $batalla): ?>
        <div class="col-sm-4"> 
            <div class="batalla">
                <p><strong>Batalla:</strong> <?php echo $batalla['Batalla']; ?></p>
                <p><strong>Fecha:</strong> <?php echo $batalla['Fecha']; ?></p>
                <p><strong>Ganador:</strong> <?php echo $batalla['Ganador']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

>>>>>>> fc583fc55b79bd9107d228683f07fb9afdf4b414
        </div>
    </div>
</body>
</html>

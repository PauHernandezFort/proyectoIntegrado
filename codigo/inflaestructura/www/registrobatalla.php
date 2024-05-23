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
        $batallas[] = $row;
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
            margin-bottom: 20px;
        }

        .batalla .card {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .batalla .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .batalla .card-body {
            padding: 20px;
        }

        .batalla p {
            margin-bottom: 10px;
        }

        .batalla strong {
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
                <div class="col-sm-3"> 
                    <div class="batalla">
                        <div class="card">
                            <div class="card-body">
                                <p><strong>ID Batalla:</strong> <?php echo $batalla['id']; ?></p>
                                <p><strong>Fecha:</strong> <?php echo $batalla['fecha']; ?></p>
                                <p><strong>Ganador:</strong> <?php echo $batalla['ganador']; ?></p>
                                <a href='infoBatalla.php?id=<?php echo $batalla['id']; ?>' class='btn btn-primary'>Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

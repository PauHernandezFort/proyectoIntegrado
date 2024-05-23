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

    $i = 1;
   
    $output = '';

    while ($row = $result->fetch_assoc()) {
        $output .= "
            <div class='col-sm-3'> 
                <div class='batalla'>
                    <div class='card'>
                        <div class='card-body'>
                            <p><strong>ID Batalla:</strong> {$row['id']}</p>
                            <p><strong>Fecha:</strong> {$row['fecha']}</p>
                            <p><strong>Ganador:</strong> {$row['ganador']}</p>
                            <a href='infoBatalla.php?id={$row['id']}&NBatalla={$i}' class='btn btn-primary'>Info</a>

                        </div>
                    </div>
                </div>
            </div>";
            $i++;
    }
    
    return $output;
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
    <title>Registro Batalla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background-image: url('/img/bosquejapones.jpg');
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

        .card {
            width: 180px; /* 25% para que se ajuste a 4 tarjetas por fila con Bootstrap */
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin:5px;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-body p {
            margin-bottom: 10px;
        }

        .card-body strong {
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
        <?php echo drawlist($conn, $nombrePersonaje); ?>
    </div>
</div>

</body>
</html>
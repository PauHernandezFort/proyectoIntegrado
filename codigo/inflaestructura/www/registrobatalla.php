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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .batalla {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Historial de Batallas</h1>

    <?php foreach ($batallas as $batalla): ?>
        <div class="batalla">
            <p><strong>ID Batalla:</strong> <?php echo $batalla['id']; ?></p>
            <p><strong>Fecha:</strong> <?php echo $batalla['Fecha']; ?></p>
            <p><strong>Ganador:</strong> <?php echo $batalla['Ganador']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>


<?php

require_once("autoloader.php");
$connection = new Connection();

function drawlist($conn, $nombrePersonaje) {
    $sql5 = "
        SELECT b.*
        FROM Batalla b
        JOIN BatallaPersonaje bp ON b.id = bp.idbatalla
        WHERE bp.nombrePersonaje = ?";
    
    $stmt = $conn->prepare($sql5);
    $stmt->bind_param("s", $nombrePersonaje);
    $stmt->execute();
    $result = $stmt->get_result();

    $batallas = [];
    while ($row = $result->fetch_assoc()) {
        $batallas[] = [
            'id' => $row['id'],
            'Fecha' => $row['fecha'],
            'Ganador' => $row['ganador']
        ];
    }

    foreach ($batallas as $batalla) {
        echo "ID Batalla: " . $batalla['id'] . "<br>";
        echo "Fecha: " . $batalla['Fecha'] . "<br>";
        echo "Ganador: " . $batalla['Ganador'] . "<br><br>";
    }

    return $batallas;
}

$conn = $connection->getConn();



$jugadorCorreo = $_COOKIE["correo"];


$sql3 = "SELECT nombre FROM Personaje WHERE correoCuenta = ?";
$stmt = $conn->prepare($sql3);
$stmt->bind_param("s", $jugadorCorreo);
$stmt->execute();
$result = $stmt->get_result();
$resultado = $result->fetch_assoc();

if ($resultado) {
    $nombrePersonaje = $resultado['nombre'];
    drawlist($conn, $nombrePersonaje);
} else {
    echo "No se encontró un personaje asociado con el correo: " . $jugadorCorreo;
}

?>


<?php
require_once 'autoloader.php';
$secure = 0;
$correo = $usuario = $_COOKIE['correo'];
$conexion = new Connection;
$conn = $conexion->getConn();
$sql = "SELECT `contraseña` FROM `Cuenta` WHERE `correo` = '$correo'";
$result = mysqli_query($conn, $sql);
$array = $result->fetch_array();
$contraseña_bd = $array[0];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contraseña_usuario = $_POST['contraseña'];

    if (password_verify($contraseña_usuario, $contraseña_bd)) {
        $secure = 1;
    } else {
        echo "Contraseña incorrecta. Inténtalo de nuevo.";
    }
}
if ($secure == 1) {
    header("Location: eliminarCuenta.php");
    exit; 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
</head>
<body>
    <h2>Ingresar Contraseña para Confirmar</h2>
    <form action="" method="POST">
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>
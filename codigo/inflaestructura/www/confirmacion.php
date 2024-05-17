
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion</title>
</head>
<body>
    <h2>Ingresar Contraseña para confirmar </h2>
    <form action="" method="POST">
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>

<?php
require_once 'autoloader.php';
$correo = $usuario = $_COOKIE['correo'];
$conexion = new Connection;
$conn = $conexion->getConn();
$sql = "SELECT `contraseña` FROM `Cuenta` where `correo` = '$correo'";
$result = mysqli_query($conn, $sql);
$array = $result->fetch_array();
$contraseña = $array[0];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respuesta= $_POST['contraseña'];
    echo $respuesta;
    $secure = password_hash($respuesta, PASSWORD_DEFAULT);
    echo $secure;
if ($secure == $contraseña){

    header("location: eliminarCuenta.php");
}else{
    echo"contraseña incorrecta";
}
    }
?>

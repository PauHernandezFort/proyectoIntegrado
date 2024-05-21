<?php
require_once 'autoloader.php';

session_start();

if (!isset($_COOKIE['correo'])) {
    echo "No estás autenticado.";
    exit;
}
//

$correo = $_COOKIE['correo'];
$conexion = new Connection;
$conn = $conexion->getConn();
$sql = "SELECT `contraseña` FROM `Cuenta` WHERE `correo` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();
$array = $result->fetch_array();
$contraseña_bd = $array['contraseña'];

$secure = 0;
$error="";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contraseña_usuario = $_POST['contraseña'];

    if (password_verify($contraseña_usuario, $contraseña_bd)) {
            header("Location: eliminarCuenta.php");
            exit; 
        
    } else {
       $error = "Contraseña incorrecta. Inténtalo de nuevo.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
body {
    font-family: 'Press Start 2P', cursive;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 350px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    font-size: 1.2rem;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    font-weight: bold;
    margin-bottom: 10px;
    font-size: 1rem;
}

input[type="password"] {
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 4px;
    width: 100%;
    margin-bottom: 20px;
    box-sizing: border-box;
    font-family: 'Press Start 2P', cursive;
    font-size: 0.8rem;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Press Start 2P', cursive;
    font-size: 0.8rem;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: red;
    font-weight: bold;
    font-size: 0.8rem;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Ingresar Contraseña para Confirmar</h2>
        <form action="" method="POST">
            <label for="contraseña">Contraseña:</label>
            <h3 id="error"></h3>
            <input type="password" id="contraseña" name="contraseña" required><br><br>
            <input type="submit" value="Ingresar">
        </form>
    </div>
    <script>    
   let error = <?php echo json_encode($error); ?>;
   let text = document.getElementById('error');
   text.innerHTML = error;
   text.style.color = 'red';
</script>
</body>
</html>

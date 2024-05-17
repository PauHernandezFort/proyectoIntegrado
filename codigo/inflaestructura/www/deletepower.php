<?php
require_once "autoloader.php";

$modelo = new Connection();
$conn = $modelo->getConn();
if(isset($_GET['nombrePoder']) && !empty($_GET['nombrePoder'])) {
  
    $nombre = $conn->real_escape_string($_GET['nombrePoder']);
    $query = "DELETE FROM Poder WHERE nombrePoder = '$nombre'";
    if($conn->query($query)) {
      
        $conn->close();
        header("Location: home.php");
        exit; 
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Poder</title>
</head>
<body>
    <h1>Eliminar Poder</h1>
    <label for="nombrePoder">Seleccione el nombre del poder a eliminar:</label>
    <select id="nombrePoder" name="nombrePoder">
        <option value="Poder1"></option>
 
    </select>
    <br><br>
    <button onclick="eliminarPoder()">Eliminar</button>

    <script>
        function eliminarPoder() {
            var nombrePoder = document.getElementById("nombrePoder").value;
        }
    </script>
</body>
</html>

<?php
require_once "autoloader.php";
$power = new Power("polla");
$array = $power->getAllPowers();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["nombrePoder"])) {
    $power_name = $_GET["nombrePoder"];
    
    $id_power = $poder->findName($power_name);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombrePoder"];
    $daño = $_POST["daño"];
    $coste = $_POST["coste"];
    $descripcion = $_POST["descripcion"];
    
    $power->updatePower($nombre, $daño, $coste, $descripcion);

    header("Location: home.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Poder</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('fondo.jpeg');
            background-color: #000;
            color: #00FF00;
            font-family: 'Press Start 2P', cursive;
        }
        #form_container {
            background-color: #a07474;
            padding: 20px;
            border-radius: 5px;
            margin: 50px auto;
            max-width: 400px;
            border: 1px solid #444;
        }
        h1 {
            text-align: center;
            color: #FFD700;
        }
        .form-description {
            margin-bottom: 20px;
        }
 
        label[for="nombrePoder"] {
            color: #FF6347; 
        }
        label[for="daño"] {
            color: #00CED1; 
        }
        label[for="coste"] {
            color: #FFD700; 
        }
        label[for="descripcion"] {
            color: #00FF7F;
        }
    </style>
</head>
<body>
    <div id="form_container">
        <h1>Editar Poder</h1>
        <form method="POST" action="">
            <div class="form-group">
            <label for="nombrePoder">Nombre poder:</label>
             <select id="nombrePoder" name="nombrePoder">
            </select><br><br>
            </div>
            <div class="form-group">
                <label for="daño">Daño:</label>
                <input type="number" class="form-control" id="daño" name="daño" required>
            </div>
            <div class="form-group">
                <label for="coste">Coste:</label>
                <input type="number" class="form-control" id="coste" name="coste" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Poder</button>
        </form>
    </div>
    <script>
var poderes = <?php echo json_encode($array); ?>;

window.onload = agregarPoderes;

function agregarPoderes() {
    for (var i = 0; i < poderes.length; i++) {
        var option = document.createElement("option");
        option.text = poderes[i];
        option.value = poderes[i];
        var selectPoder1 = document.getElementById("nombrePoder");
        selectPoder1.add(option.cloneNode(true));
   
    }
}
//hla

</script>
</body>
</html>

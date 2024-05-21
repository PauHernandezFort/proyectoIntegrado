<?php
require_once "autoloader.php";


$poderes = new Power("Poder1");
$array = $poderes->getAllPowers();


if (isset($_COOKIE['correo'])) {
    $usuario = $_COOKIE['correo'];
} else {
    echo "Error inesperado, vuelve a iniciar sesión";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Character</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <meta name="theme-color" content="#343a40">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-image: url('fondoModPersonaje.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding-top: 70px; /* Add padding to avoid content hiding behind the navbar */
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-box {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="logo.jpeg" alt="Avatar Logo" class="d-inline-block align-top" style="height: 40px;">
            </a>
        </div>
    </nav>
    <div class="container form-container">
        <div class="form-box">
            <h1 class="text-center">Update Character</h1>
            <form action="modificarcreacion.php" method="POST" onsubmit="return validarFormulario()">
                <div class="form-group">
                    <label for="energia">Energía:</label>
                    <input type="number" id="energia" name="energia" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="vida">Vida:</label>
                    <input type="number" id="vida" name="vida" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="daño">Daño:</label>
                    <input type="number" id="daño" name="daño" class="form-control" required>
                </div>
                <label for="poder1">Poder1:</label>
            <select id="poder1" name="poder1">
            </select><br><br>

             <label for="poder2">Poder 2:</label>
            <select id="poder2" name="poder2">
             </select><br><br>

                 <label for="poder3">Poder 3:</label>
             <select id="poder3" name="poder3">
                </select><br><br>
                <button type="submit" class="btn btn-primary btn-block">Update Character</button>
            </form>
        </div>
    </div>
    <script>
         var poderes = <?php echo json_encode($array); ?>;
         window.onload = agregarPoderes;
         function agregarPoderes() {
            for (var i = 0; i < poderes.length; i++) {
                var option = document.createElement("option");
                option.text = poderes[i];
                option.value = poderes[i];

                var selectPoder1 = document.getElementById("poder1");
                var selectPoder2 = document.getElementById("poder2");
                var selectPoder3 = document.getElementById("poder3");

                selectPoder1.add(option.cloneNode(true));
                selectPoder2.add(option.cloneNode(true));
                selectPoder3.add(option.cloneNode(true));
            }
        }
        function validarFormulario() {
            var daño = parseInt(document.getElementById("daño").value);
            var energia = parseInt(document.getElementById("energia").value);
            var vida = parseInt(document.getElementById("vida").value);

            var poder1 = document.getElementById("poder1").value;
            var poder2 = document.getElementById("poder2").value;
            var poder3 = document.getElementById("poder3").value;

            if (danio + energia + vida !== 100) {
                alert("La suma de los campos de daño, energía y vida debe ser igual a 100.");
                return false;
            }

            if (poder1 === poder2 || poder1 === poder3 || poder2 === poder3) {
                alert("No puedes seleccionar el mismo poder en diferentes campos.");
                return false;
            }

            return true;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <a href="home.php" class="fixed-button-left">
        <button class="btn btn-primary">Return</button>
</body>
</html>

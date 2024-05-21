<?php
require_once "autoloader.php"; 

$power = new Power(""); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <meta name="theme-color" content="#343a40">
    <link href="home.css" rel="stylesheet">
    <title>Cartas de Poder</title>
    <style>
        /*Estos estilos son para las cards y el posicionamiento ya que las cards las cojo del drawList de Power.*/
        .card {
            margin: 15px;
        }
        .fixed-button-left {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
        }
        .text-white {
            color: white;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="logo.jpeg" alt="Avatar Logo" style="width:40px;" class="rounded-pill" > 
            </a>
        </div>
</nav>
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-white">Cartas de Poder</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $htmlListaPoderes = $power->drawList(); 
            echo $htmlListaPoderes;
            ?>
        </div>
    </div>
</body>
</html>

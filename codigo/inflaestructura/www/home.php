<?php
require_once 'autoloader.php';
$correo = $usuario = $_COOKIE['correo'];
$conexion = new Connection();
$conn = $conexion->getConn();
$sql = "SELECT `nombre` FROM `Personaje` where `correocuenta` = '$correo'";
$result = mysqli_query($conn, $sql);
$lineas= mysqli_num_rows($result);
echo $lineas;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>Home</title>
    <style>
      

    </style>
    <link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <meta name="theme-color" content="#343a40">
    <link href="home.css" rel="stylesheet">
    
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="logo.jpeg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> 
            </a>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ajustes</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Modificar Personaje</a></li>
                  <li><a class="dropdown-item" href="login.php">Cerrar Sesion</a></li>
                  <li><a class="dropdown-item" href="confirmacion.php">Eliminar Cuenta</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.html">Contacto</a>
              </li>
            </ul>
        </div>
    </nav>

    <header>
        <h1>PoketGame</h1>
    </header>

    <a href="" class="fixed-button-left">
        <button class="btn btn-primary">MODIFICAR PODERES</button>
    </a>

    <a href="" class="fixed-button-right">
        <button class="btn btn-success">EMPEZAR BATALLA</button>
    </a>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    let correo = <?php echo json_encode($correo); ?>;
    let lineas = <?php echo json_encode($lineas); ?>;
    if (correo === 'admin.com') {
        let dropdownMenu = document.querySelector('.dropdown-menu');
        let createPowerItem = document.createElement('li');
        createPowerItem.innerHTML = '<a class="dropdown-item" href="createPower.php">Crear Poderes</a>';
        dropdownMenu.appendChild(createPowerItem);
    }
    if (lineas === 0) {
        let botonPelea = document.querySelector('.fixed-button-right');
        botonPelea.innerText = 'CREAR PERSONAJE';
        botonPelea.setAttribute('href', 'createPersonaje.php');
        botonPelea.classList.add('btn', 'btn-success');
    }
});
</script>
</body>
</html>

<?php
require_once "autoloader.php";
$security = new Security();
$loginMessage = $security->doLogin();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <meta name="theme-color" content="#343a40">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
       
        body {
            font-family: 'Press Start 2P', cursive;
            background-image: url('singUp.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Press Start 2P', cursive;
        }

        #form_container {
            width: 300px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        .form_description {
            text-align: center;
        }

        .element input {
            width: 100%;
        }

        .buttons {
            text-align: center;
        }

        .button_text {
            margin: 10px auto;
        }
    </style>
</head>

<body>
    <div id="form_container">
        <h2 class="form_description">Iniciar sesión</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="text" class="form-control" maxlength="255" value="">
            </div>
            <div class="form-group">
                <label for="userPassword">Contraseña:</label>
                <input name="userPassword" type="password" class="form-control" maxlength="255" value="">
            </div>
            <h4 id="error" text-color="red"></h4>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
            <button type="button" name="submit" class="btn btn-primary btn-block" onclick="window.location.href='signUp.php'">Registrarse</button>
        </form>
    </div>
    <iframe id="youtube-player" width="1" height="1" src="https://www.youtube.com/embed/kKyPO7RHmdw?si=62gcqj-PgIjPiIUs&autoplay=1&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</body>
<script>    
   let error = <?php echo json_encode($loginMessage); ?>;
   let text = document.getElementById('error');
   text.innerHTML = error;
   text.style.color = 'red';
</script>

</html>
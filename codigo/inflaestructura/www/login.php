<?php
require_once "autoloader.php";
$security = new Security();
$loginMessage = $security->doLogin();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <meta name="theme-color" content="#343a40">
    <style>
        @font-face {
            font-family: 'Press Start 2P';
            src: url('ruta/a/la/fuente/PressStart2P-Regular.ttf') format('truetype'); /* Reemplaza 'ruta/a/la/fuente' por la ruta real de la fuente */
        }

        body {
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
<body>
    <h2>Iniciar sesión</h2>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input name="email" type="text" maxlength="255" value=""/>
        
        <label for="userPassword">Contraseña:</label>
        <input name="userPassword" type="password" maxlength="255" value=""/>
        
        <input type="submit" name="submit" value="Iniciar sesión"/>
    </form>
</body>
</html>
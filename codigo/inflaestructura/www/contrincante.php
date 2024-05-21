<?php
require_once "autoloader.php"; // Asegúrate de que tu autoloader incluya la clase Connection

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si la solicitud es POST
    $email = $_POST['email']; // Obtiene el correo electrónico del formulario
    $password = $_POST['userPassword']; // Obtiene la contraseña del formulario

    if (empty($email) || empty($password)) { // Verifica si el correo electrónico o la contraseña están vacíos
        echo "El correo electrónico o la contraseña no fueron proporcionados."; // Muestra un mensaje de error si algún campo está vacío
    } else {
        $conexion = new Connection(); // Crear una instancia de la clase Connection
        $conn = $conexion->getConn(); // Obtener la conexión a la base de datos
 // Crea una nueva instancia de la clase Connection para conectar con la base de datos

        $query = "SELECT * FROM Cuenta WHERE correo = '$email'";
        $result = mysqli_query($conn, $query); // Obtiene el resultado de la consulta

        if ($result->num_rows > 0) { // Verifica si la consulta devolvió al menos una fila
            $user2 = $result->fetch_assoc(); // Obtiene los datos del usuario como un array asociativo

            if (password_verify($password, $user2['contraseña'])) { // Verifica si la contraseña proporcionada coincide con la almacenada en la base de datos
                session_start(); // Inicia una nueva sesión o reanuda la existente
                $_SESSION['loggedIn'] = true; // Establece la sesión como iniciada
                $_SESSION['email'] = $user2['correo']; // Almacena el correo electrónico del usuario en la sesión

                // Redirigir a la página de batalla
                header("Location: batalla.php"); // Redirige al usuario a la página de batalla
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                echo "Correo electrónico o contraseña incorrectos."; // Muestra un mensaje de error si la contraseña es incorrecta
            }
        } else {
            echo "Correo electrónico o contraseña incorrectos."; // Muestra un mensaje de error si no se encuentra el correo electrónico
        }

        $conn->conn->close(); // Cierra la conexión a la base de datos
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Contrincante</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <meta name="theme-color" content="#343a40">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
       
        body {
            font-family: 'Press Start 2P', cursive;
            background-image: url('fondobuscarbatalla.jpg');
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
<!-- sorry not sorry bb pero me he copiado el estilo ya que soy una ameba para la creatividad. Los artistas mueren de hambre -->
<body>
    <div id="form_container">
        <h2 class="form_description">contrincante</h2>
        <form action="contrincante.php" method="post">
            <div class="form-group">
                <label for="email">correo:</label>
                <input name="email" type="text" class="form-control" maxlength="255" value="">
            </div>
            <div class="form-group">
                <label for="userPassword">contraseña:</label>
                <input name="userPassword" type="password" class="form-control" maxlength="255" value="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Iniciar Batalla</button>
            
        </form>
    </div>
</body>

    </a>

</html>
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

        .buttons {
            text-align: center;
        }

        .button_text {
            margin: 10px auto;
        }
    </style>
</head>

<body id="main_body">
    <div id="form_container" class="container">
        <h1 class="text-center">Sign Up</h1>
        <form class="appnitro" method="post" action="">
            <div class="form-group">
                <label for="userName">User Name</label>
                <input name="userName" class="form-control" type="text" maxlength="255" value="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" class="form-control" type="text" maxlength="255" value="">
            </div>
            <div class="form-group">
                <label for="userPassword">User Password</label>
                <input name="userPassword" class="form-control" type="password" maxlength="255" value="">
            </div>
            <div class="buttons">
                <input id="saveForm" class="btn btn-primary button_text" type="submit" name="submit" value="Sign Up">
            </div>
        </form>
    </div>
</body>

</html>

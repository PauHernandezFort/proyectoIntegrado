<?php
require_once "autoloader.php";
$security = new Security();
$security->singUp();

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

<body id="main_body">
    <div id="form_container" class="container">
        <h1 class="text-center">Sign Up</h1>
        <form class="appnitro" method="post" action="">
					<div class="form_description">
			<p></p>
		</div>
			<ul >

					<li id="li_1" >
		<label class="description" for="userName">User Name </label>
		<div>
			<input name="userName" class="" type="text" maxlength="255" value=""/>
		</div>

        <label class="description" for="email">Email </label>
    <div>
	<input name="email" class="" type="text" maxlength="255" value=""/>
    </div>

		<label class="description" for="userPassword">User Password </label>
		<div>
			<input name="userPassword" class="element text medium" type="password" maxlength="255" value=""/>
		</div>
		</li>

					<li class="buttons">

				<input id="saveForm" class="button_text" type="submit" name="submit" value="Log In" />
		</li>
			</ul>
		</form>
    </div>
</body>

</html>
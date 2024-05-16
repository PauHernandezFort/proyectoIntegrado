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
    <link rel="stylesheet" type="text/css" href="form/view.css" media="all">
    <script type="text/javascript" src="form/view.js"></script>
   
    <link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <meta name="theme-color" content="#343a40">
    <style>


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
    <img id="top" src="form/top.png" alt="">
    <div id="form_container">
        <h1><a>sign up</a></h1>
        <form class="appnitro" method="post" action="">
            <div class="form_description">
              
                <p></p>
            </div>
            <ul>
                <li id="li_1">
                    <label class="description" for="userName">User Name </label>
                    <div>
                        <input name="userName" class="element text medium" type="text" maxlength="255" value="" />
                    </div>
                </li>
                <li id="li_1">
                    <label class="description" for="email">Email </label>
                    <div>
                        <input name="email" class="element text medium" type="text" maxlength="255" value="" />
                    </div>
                </li>
                <li id="li_2">
                    <label class="description" for="userPassword">User Password </label>
                    <div>
                        <input name="userPassword" class="element text medium" type="password" maxlength="255" value="" />
                    </div>
                </li>
                <li class="buttons">
                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Log In" />
                </li>
            </ul>
        </form>
    </div>
    <img id="bottom" src="form/bottom.png" alt="">
</body>

</html>

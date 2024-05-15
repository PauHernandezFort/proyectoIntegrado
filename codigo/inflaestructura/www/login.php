<?php
require_once "autoloader.php";
$security = new Security();
$loginMessage = $security->doLogin();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>
<link href="logo.jpeg" rel="icon" type="image/x-icon">
    <link href="logo.jpeg" rel="icon" type="image/png">
    <link href="logo.jpeg" rel="apple-touch-icon" sizes="180x180">
    <meta name="theme-color" content="#343a40"> 
</head>
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
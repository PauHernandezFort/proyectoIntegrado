<?php
require_once "autoloader.php";
$security = new Security();
$security->singUp();
?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="form/view.css" media="all">
    <script type="text/javascript" src="form/view.js"></script>

</head>

<body id="main_body">

    <img id="top" src="form/top.png" alt="">
    <div id="form_container">

        <h1><a>sing up</a></h1>
        <form class="appnitro" method="post" action="">
            <div class="form_description">
                <h2>sing up</h2>
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
                        <input name="userPassword" class="element text medium" type="password" maxlength="255"
                            value="" />
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
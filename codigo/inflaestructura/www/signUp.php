<?php
require_once "autoloader.php";
$security = new Security();
$security->signUp();
$loginMessage = $security->doLogin();
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="form/view.css" media="all">
<script type="text/javascript" src="form/view.js"></script>

</head>
<body id="main_body" >

	<img id="top" src="form/top.png" alt="">
	<div id="form_container">

		
		<div class="form_description">
			<h1>Sign Up</h1>
			<h4><?=$loginMessage?></h4>
			<p></p>
		</div>
			
		<ul >

		<li id="li_1" >
		<label class="description" for="userName">User Name</label>
		<div>
			<input name="userName" class="" type="text" maxlength="255" value=""/>
		</div>
		<br>
		<li id="li_1" >
        <label class="description" for="email">Email</label>
    	<div>
			<input name="email" class="" type="text" maxlength="255" value=""/>
    	</div>
		<br>
		<li id="li_1" >
		<label class="description" for="userPassword">User Password</label>
		<div>
			<input name="userPassword" class="element text medium" type="password" maxlength="255" value=""/>
		</div>
		</li>
		<br>
			<input id="saveForm" class="button_text" type="submit" name="submit" value="Log In" />
	
		</ul>
		</form>
		<div id="footer">
			Generated by <a href="http://www.floridauniversitaria.es">DAW1</a>
		</div>
	</div>
	<img id="bottom" src="form/bottom.png" alt="">
	</body>
</html>

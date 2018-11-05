<?php
	session_start();
	$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
	unset($_SESSION['message']);
?>
<?php $thisPage="index"; ?>

<html>
	<head>
		<link href="website.css" type="text/css" rel="stylesheet" />
		<title>Welcome!</title>
	</head>
	<body>
		<div class="nav">
		<img src="carLogo.png" alt="Trulli" width="250" height="200">
    		<ul id="navList">
        		<li><a<?php if ($thisPage=="index") echo " class=\"currentpage\""; ?> href="index.php">Main Page</a></li>
    		</ul>
		</div>
		<div class="main">
			<div id="card">
				<h1>Please Login</h1>
				<!--<form id="login">
					Username:<br>
					<input type="text" name="username"></br>
					Password:<br>
					<input type="text" name="password"></br>
					<button type="button" onclick="location.href='mainPage.php'">Login</button>
				</form>-->

				<form id="login" method="post" action="login_handler.php">
					Username:<br>
					<input type="text" id="login" name="login"><br>
					Password:<br>
		  			<input type="password" id="password" name="password"><br>
					<input type="submit" value="Submit">
				</form>

			</div>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>

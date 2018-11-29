<?php
	session_start();
	//echo "<pre>" . print_r($_SESSION,1) . "</pre>";
	$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
	unset($_SESSION['message']);
?>
<?php $thisPage="index"; ?>

<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
		<link href="website.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="jquery-3.3.1.js"></script>
		<script type="text/javascript" src="index.js"></script>
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
				
				<?php if(!empty($message)) { ?>
					<div id="message"><?php echo $message; ?></div><?php 
					} 
				?>

				<form method="post" action="login_handler.php">
					<label for="login">Username:</label><br>
					<input type="text" id="login" name="login"><br>
					<label for="password">Password:</label><br>
		  			<input type="password" id="password" name="password"><br>
					<input class="button" type="submit" value="Submit">
				</form>

			</div>
			<div id="card">
				<h4>New User? Sign Up!</h4>

				<button class="button" type="button" id="formButton">Add User!</button>

				<form id="newUser" method="post" action="newUserHandler.php">
					<label for="username">Username:</label><br>
					<input type="text" name="username" id="username"><br>
					<label for="userpassword">Password:</label><br>
		  			<input type="password" name="userpassword" id="userpassword"><br>
					<input class="button" type="submit" value="Submit">
				</form>
			</div>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>

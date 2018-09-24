<?php $thisPage="index"; ?>
<html>
	<head>
		<link href="website.css" type="text/css" rel="stylesheet" />
		<title>Welcome!</title>
	</head>
	<body>
		<div class="nav">
    		<ul id="navList">
        		<li><a<?php if ($thisPage=="index") echo " class=\"currentpage\""; ?> href="index.php">Main Page</a></li>
    		</ul>
		</div>
		<div class="main">
			<div id="card">
				<h1>Please Login</h1>
				<form>
					Username:<br>
					<input type="text" name="username"></br>
					Password:<br>
					<input type="text" name="password"></br>
					<button type="button" onclick="location.href='mainPage.php'">Login</button>
				</form>
			</div>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>

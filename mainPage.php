<?php $thisPage="mainPage"; ?>
<html>
	<head>
        <link rel="icon" type="image/x-icon" href="favicon.ico"/>
	    <link href="website.css" type="text/css" rel="stylesheet" />
        <title>Main Page</title>
	</head>
	<body>
        <?php require_once "nav.php"; ?>
		<div class="main">
            <?php require_once "logoutButton.php"; ?>
            <div id="card">
                <h1>Main Page</h1>
            </div>
		</div>
	</body>
</html>
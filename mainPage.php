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
            <div id="card">
                <h3>You have 7 planned trips</h3>
                <p>Your next trip is on 11/2/18 with (User), (User2), (User3), etc. . .</p>
            </div>
            <div id="card">
                <h3>You have 1 new message</h3>
                <p>(Some type of message preview with link to the message)</p>
            </div>
            <div id="card">
                <h3>Calendar</h3>
                <p>Find some way to put calendar here with the trips on it ¯\_(ツ)_/¯</p>
            </div>
            <?php require_once "footer.php"; ?>
		</div>
	</body>
</html>
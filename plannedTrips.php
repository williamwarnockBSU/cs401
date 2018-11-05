<?php 
	$thisPage="plannedTrips"; 
	session_start();

    //echo "<pre>" . print_r($_SESSION,1) . "</pre>";

    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: index.php');
        exit;
    }
?>
<html>
	<head>
	<link href="website.css" type="text/css" rel="stylesheet" />
		<title>Planned Trips</title>
	</head>
	<body>
		<?php require_once "nav.php"; ?>
		<div class="main">
			<?php require_once "logoutButton.php"; ?>
			<div id="card">
                <h1>Planned Trips</h1>
            </div>
			<?php
				for ($x = 1; $x <= 7; $x++) {
					echo "
						<div id=\"card\">
						<h3>Trip $x</h3>
						<p>From (location) to (location)</p>
						<p>Dates: 11/2/18 - 11/10/18</p>
						<p>With (User), (User2), (User3), etc. . .</p>
						<p><a href=\"messages.php\">Message Group</a>
						</div>";
				}
			?>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>

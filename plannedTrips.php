<?php 
	$thisPage="plannedTrips"; 
	session_start();

    //echo "<pre>" . print_r($_SESSION,1) . "</pre>";

    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: index.php');
        exit;
	}
	
	require_once 'plannedTripsDAO.php';
	$dao = new plannedTripsDAO();
	$login = $_SESSION['username'];
	$plannedTrips = $dao->getUserTrips($login);  
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
				$num = 1;
				foreach ($plannedTrips as $trip) {
					$user = $trip['user2'];
					$tripNum = $trip['tripID'];

					$tripInfo = $dao->getTripInfo ($tripNum);

					foreach ($tripInfo as $oneInfo) {
						$startLocation= $oneInfo['startLocation'];
						$endLocation = $oneInfo['endLocation'];
						$startDate = $oneInfo['startDate'];
						$endDate = $oneInfo['endDate'];
					}

					echo "
					<div id=\"card\">
					<h3>Trip " . htmlspecialchars($num) . "</h3>
					<p>From " . htmlspecialchars($startLocation) . " to " . htmlspecialchars($endLocation) . "</p>
					<p>Start Date: " . htmlspecialchars($startDate) . "</p>
					<p>End Date: " . htmlspecialchars($endDate) . "</p>
					<p>With " . htmlspecialchars($user) . "</p>
					<p><a href=\"writeMessage.php\">Message User</a>
					</div>";
					$num++;
  				}
			?>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>

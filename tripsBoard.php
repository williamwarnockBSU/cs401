<?php 
	$thisPage="tripsBoard"; 
	session_start();

    //echo "<pre>" . print_r($_SESSION,1) . "</pre>";

    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: index.php');
        exit;
	}

	require_once 'plannedTripsDAO.php';
	$dao = new plannedTripsDAO();
	$login = $_SESSION['username'];
    $tripsNotFull = $dao->listTripsNotFull ($login);
?>
<html>
	<head>
		<link href="website.css" type="text/css" rel="stylesheet" />
		<title>Trips Board</title>
	</head>
	<body>
		<?php require_once "nav.php"; ?>
		<div class="main">
		<?php require_once "logoutButton.php"; ?>
			<div id="card">
                <h1>Trips Board</h1>
			</div>
			<div id="card">
                <h3>Create a Trip</h3>
				<form id="createTrip" method="post" action="createTripHandler.php">
					Start Location:
					<input type="text" name="createStartLocation">
					Destination:
					<input type="text" name="createDestination">
					Start Date:
					<input type="date" name="createstartDate">
					End Date:
					<input type="date" name="createEndDate">
					<input class="button" type="submit" value="Create">
				</form>
			</div>
			<div id="card">
				<h3>Find a Trip</h3>
				<!--<form id="findTrip" method="post" action="findTripHandler.php">
					Start Location:
					<input type="text" name="findStartLocation">
					Destination:
					<input type="text" name="findDestination">
					<button type="button" onclick="">Search</button>
				</form>-->
				<table id="tripsTable">
					<tr>
						<th>Start Location</th>
						<th>Destination</th>
						<th>User</th>
						<th>Date</th>
						<th>Join</th>
					</tr>
					<?php
                    		foreach ($tripsNotFull as $trip) {
								$startLocation = $trip['startLocation'];
								$endLocation = $trip['endLocation'];
								$user = $trip['user1'];
								$startDate = $trip['startDate'];

								echo "
									<tr>
										<td>" . htmlspecialchars($startLocation) . "</td>
										<td>" . htmlspecialchars($endLocation) . "</td>
										<td>" . htmlspecialchars($user) . "</td>
										<td>" . htmlspecialchars($startDate) . "</td>
										<td><a class=\"button\" href='joinTrip.php?id={$login}&tripNum={$trip['tripID']}'/>Join</a></td>
									</tr>
								";
                    		}
                		?>
				</table>
			</div>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>

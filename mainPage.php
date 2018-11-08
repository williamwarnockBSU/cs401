<?php 
    $thisPage="mainPage"; 
    session_start();

    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: index.php');
        exit;
    }

    require_once 'plannedTripsDAO.php';
	$dao = new plannedTripsDAO();
	$login = $_SESSION['username'];
    $numPlannedTrips = $dao->getNumTrips ($login);
    $nextTrip = $dao->getNextTrip ($login);

    require_once 'messagesDAO.php';
    $daoMessages = new messagesDAO();
    $numMessages = $daoMessages->numMessages ($login);
?>

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
                <?php
                    foreach ($numPlannedTrips as $info) {
						$num = $info['count(*)'];
                    }
                    echo "<h3>You have $num planned trips</h3>";

                    if($num == 0) {
                        echo "<p>No trips!</p>";
                    }else {
                        foreach ($nextTrip as $trip) {
                            $startDate = $trip['startDate'];
                            $endDate = $trip['endDate'];
                        }
                        echo "<p>Next trip starts on $startDate and ends on $endDate</p>";
                    }
                ?>
            </div>
            <div id="card">
                
                <?php
                    foreach ($numMessages as $messageInfo) {
						$mNum = $messageInfo['count(*)'];
                    }
                    echo "<h3>You have $mNum messages</h3>";
                ?>
            </div>
            <!--
            <div id="card">
                <h3>Calendar</h3>
                <p>Find some way to put calendar here with the trips on it ¯\_(ツ)_/¯</p>
            </div>
            -->
            <?php require_once "footer.php"; ?>
		</div>
	</body>
</html>
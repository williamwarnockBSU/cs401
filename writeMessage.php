<?php 
	$thisPage="messages"; 
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
		<title>Messages</title>
	</head>
	<body>
		<?php require_once "nav.php"; ?>
		<div class="main">
		<?php require_once "logoutButton.php"; ?>
			<div id="card">
                <h1>Messages</h1>
			</div>
			<div id="card">
				<div class="messageNav">
					<ul id="navList">
						<li><a class="currentPage" href="writeMessage.php">Write Message</a></li>
        				<li><a href="messages.php">Inbox</a></li>
        				<li><a href="sentMessages.php">Sent Messages</a></li>
        				<li><a href="trash.php">Trash</a></li>
					</ul>
				</div>
				<br>
				<form method="post" action="writeMessageHandler.php" id="usrform">
  					To: <input type="text" id="to" name="to">
  					<input type="submit" value="Send">
				</form>
				<br>
				<textarea rows="20" cols="80" name="message" form="usrform"></textarea>
			</div>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>
<?php 
	$thisPage="messages"; 
	session_start();

    //echo "<pre>" . print_r($_SESSION,1) . "</pre>";

    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: index.php');
        exit;
	}
	$login = $_SESSION['username'];
	require_once 'messagesDAO.php';
	$dao = new messagesDAO();
	$allMessages = $dao->getMessages ($login);
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
						<li><a href="writeMessage.php">Write Message</a></li>
        				<li><a class="currentPage" href="messages.php">Inbox</a></li>
        				<li><a href="newMessages.php">New Messages</a></li>
        				<li><a href="trash.php">Trash</a></li>
					</ul>
				</div>
				<table id="messagesTable">
						<tr>
							<th>Sender</th>
							<th>Message</th>
							<th>Date</th>
						</tr>
						<?php
                    		foreach ($allMessages as $message) {
								$sender = $message['sender'];
								$messageText = $message['messageText'];
								$dateSent = $message['dateSent'];

								echo "
									<tr>
										<td>$sender</td>
										<td>$messageText</td>
										<td>$dateSent</td>
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

<?php $thisPage="messages"; 
session_start();

//echo "<pre>" . print_r($_SESSION,1) . "</pre>";

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  header('Location: http://cs401/comments/login.php');
  exit;
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
						<tr>
							<td>User1</td>
							<td>Hello!!</td>
							<td>9/12/18</td>
						</tr>
						<?php
							for ($x = 1; $x <= 50; $x++) {
								echo "<tr>
								<td>User1</td>
								<td>Hello!!</td>
								<td>9/12/18</td>
							</tr>";
							}
						?>
				</table>
			</div>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>
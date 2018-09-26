<?php $thisPage="tripsBoard"; ?>
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
				<form id="login">
					Start Location:
					<input type="text" name="startLocation">
					Destination:
					<input type="text" name="password">
					<button type="button" onclick="">Search</button>
				</form>
			</div>
			<div id="card">
				<table id="tripsTable">
					<tr>
						<th>Start Location</th>
						<th>Destination</th>
						<th>Users</th>
						<th>Date</th>
					</tr>
					<tr>
						<td>Here</td>
						<td>There</td>
						<td>User1542</td>
						<td>12/12/18</td>
					</tr>
					<?php
						for ($x = 1; $x <= 34; $x++) {
							echo "<tr>
							<td>Here</td>
							<td>There</td>
							<td>User1542</td>
							<td>12/12/18</td>
						</tr>";
						}
					?>
				</table>
			</div>
			<?php require_once "footer.php"; ?>
		</div>
	</body>
</html>

<div class="nav">
    <img src="carLogo.png" alt="Trulli" width="250" height="200">
    <ul id="navList">
        <li><a<?php if ($thisPage=="mainPage") echo " class=\"currentpage\""; ?> href="mainPage.php">Main Page</a></li>
        <li><a<?php if ($thisPage=="plannedTrips") echo " class=\"currentpage\""; ?> href="plannedTrips.php">Planned Trips</a></li>
        <li><a<?php if ($thisPage=="messages") echo " class=\"currentpage\""; ?> href="messages.php">Messages</a></li>
        <li><a<?php if ($thisPage=="tripsBoard") echo " class=\"currentpage\""; ?> href="tripsBoard.php">Trips Board</a></li>
    </ul>
</div>
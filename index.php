<?php
// ---------------------------------------------------------------------------------------------------//
//  PHP Database v1.0: A simple example of a PHP/MySQL database
// ---------------------------------------------------------------------------------------------------//
//  Copyright (C) 2002 David Rodgers
// ---------------------------------------------------------------------------------------------------//
//  This program is free software; you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation; either version 2 of the License, or
//  (at your option) any later version.
// ---------------------------------------------------------------------------------------------------//

// INCLUDES

// Establish database connection
include "include/dbconnect.php";

// Include functions
include "include/renderpage.php";

// Get # of subscribers
$subscribers = 0;
if (!$result = mysqli_query($db, "SELECT * FROM members ORDER BY signdate ASC;")) {
	die(mysqli_error($db)($database));
};
while ($row = mysqli_fetch_array($result)) {
	$subscribers += 1;
}

// Get most viewed
if (!$result = mysqli_query($db, "SELECT * FROM $dbtable ORDER BY views DESC LIMIT 0,1")) {
	die(mysqli_error($db)($database));
};
$myrow = mysqli_fetch_array($result);
$id = $myrow["id"];
$views = $myrow["views"];
$firstname = $myrow["firstname"];
$lastname = $myrow["lastname"];

// Get # of concerts
$numConcerts = 0;
if (!$result = mysqli_query($db, "SELECT count(*) FROM concerts")) {
	die(mysqli_error($db)($database));
};
$myrow = mysqli_fetch_array($result);
$numConcerts = $myrow["count(*)"];

// Get # of tickets
$numTickets = 0;
if (!$result = mysqli_query($db, "SELECT count(*) FROM ticket")) {
	die(mysqli_error($db)($database));
};
$myrow = mysqli_fetch_array($result);
$numTickets = $myrow["count(*)"];

// Add header
include 'include/header.php';
?>

<table align="center">
	<tr>
		<td>
			<table border="0" align="center">
				<tr>
					<td>
						<center>
							<p>
								<span class="small"><a href="add.php">Add Guitarist</a> | 
								<a onclick="PopupCenterDual('viewconcerts.php','concerts','600','420'); " href="javascript:void(0);">Upcoming Shows</a> | 
								<a onclick="PopupCenterDual('buyticket.php','Tickets','600','320'); " href="javascript:void(0);">Buy Tickets</a> | 
								<a onclick="PopupCenterDual('subscribe.php','Subscribe','600','320'); " href="javascript:void(0);">Subscribe</a> | 
								<a onclick="PopupCenterDual('about.php','About','600','320'); " href="javascript:void(0);">About</a></span>

								<TABLE border="0">
									<TR>
										<TD>
											<span class="smalldark">Most Popular: <a href="view.php?id=<?php echo $id; ?>"><?php echo $firstname; ?> <?php echo $lastname; ?></a></span></span>
										</TD>
										<TD>
											<span class="smalldark"><span class="small"> | </span>Subscribers: <a onclick="PopupCenterDual('viewsubscribers.php','View Subscribers','600','420'); " href="javascript:void(0);"><?php echo $subscribers; ?></span></span>
										</TD>
										<TD>
											<span class="smalldark"><span class="small"> | </span>Concerts: <a onclick="PopupCenterDual('viewconcerts.php','View Concerts','600','420'); " href="javascript:void(0);"><?php echo $numConcerts; ?></span></span>
										</TD>
										<TD>
											<span class="smalldark"><span class="small"> | </span>Tickets Sold: <a onclick="PopupCenterDual('viewticketholders.php','Ticket Holders','600','420'); " href="javascript:void(0);"><?php echo $numTickets; ?></span></span>
										</TD>
									</TR>
								</TABLE>
							</p>
						</center>
						<?php
						// Setup image frame
						echo "<table width=100% border=0 bordercolor=000000 marginwidth=0 marginheight=0 cellspacing=5><tr><br />";

						// Show database records
						renderimages();

						// Close Table
						echo "</tr></table>";
						?>
						<br />
					</td>
				</tr>
			</table>

			<?php
			// Add Footer
			include 'include/footer.php';
			?>

			</body>

			</html>
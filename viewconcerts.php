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
echo $style2;

// Capture passed ID
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

// Get concert data
$concertdata  = "SELECT * FROM concerts" or die(mysqli_error($db));
$concerts = mysqli_query($db, $concertdata);

?>

<div align="center">
	<img src="images/section/label-concerts.gif">
	<hr>

	<table border="0" width="100%">
		<tr>
			<td align="left">ID</td>
			<td align="left">Show Time</td>
			<td align="left">Show Date</td>
			<td align="left">Show Name</td>
			<td align="left">Tickets Sold</td>
		</tr>
		<tr>

			<?php
			while ($myrow = mysqli_fetch_array($concerts)) {
				$id = $myrow['id'];
				$showTime = $myrow["showTime"];
				$showDate = $myrow["showDate"];
				$showName = $myrow["showName"];
				$ticketData = "
		SELECT count(*)
		FROM ticket
		WHERE ticket.concerts_id = '" . $id . "'" or die(mysqli_error($db)($database));
				$tickets = mysqli_query($db, $ticketData);
				$myrow = mysqli_fetch_array($tickets);
				$ticketSold = $myrow["count(*)"];

				echo "<tr>";
				echo "<td align='left'>$id</td>";
				echo "<td align='left'>$showTime</td>";
				echo "<td align='left'>$showDate</td>";
				echo "<td align='left'>$showName</td>";
				echo "<td align='left'>$ticketSold</td>";
				echo "</tr>";
			}
			?>

		</tr>
	</table>

	<br />
	<center>
		<a href="javascript:top.close()"><img src="<?php echo $sectionimagepath; ?>/<?php echo $closeimage; ?>" border=0 alt="Close window"></a>
	</center>

	</body>

	</html>
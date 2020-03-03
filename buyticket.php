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
include "include/dbconnect.php";
echo $style2;

// Capture passed ID
$id = (isset($_POST['id'])) ? $_POST['cid'] : '';

// Get concert data
$query  = "SELECT * FROM concerts" or die(mysqli_error($db));
$result = mysqli_query($db, $query);

?>

<div align="center">
	<img src="images/section/label-chooseshow.gif">
	<hr>

	<table border="0" width="100%">
		<tr>
			<td align="left">ID</td>
			<td align="left">Show Name</td>
			<td align="left">Show Date</td>
			<td align="left">Show Time</td>
			<td align="left">Tickets Sold</td>
		</tr>
		<tr>

			<?php
			while ($myrow = mysqli_fetch_array($result)) {
				$id = $myrow['id'];
				$showName = $myrow["showName"];
				$showDate = $myrow["showDate"];
				$showTime = $myrow["showTime"];
				$ticketData = "
		SELECT count(*)
		FROM ticket
		WHERE ticket.concerts_id = '" . $id . "'" or die(mysqli_error($db));
				$tickets = mysqli_query($db, $ticketData);
				$myrow = mysqli_fetch_array($tickets);
				$ticketSold = $myrow["count(*)"];

				echo "<tr>";
				echo "<td align='left'>$id</td>";
				echo "<td align='left'><a href='confirmpurchase.php?showID=$id'>$showName</a></td>";
				echo "<td align='left'>$showDate</td>";
				echo "<td align='left'>$showTime</td>";
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
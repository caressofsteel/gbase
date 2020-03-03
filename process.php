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
include 'include/dbconnect.php';
include 'include/renderpage.php';
?>

<html>

<head>
	<title>Processing...</title>
	<?php
	echo $style1;
	echo $style2;
	?>
</head>

<body>

	<?php
	// Subscriber
	if ((isset($_POST['signup'])) ? $_POST['signup'] : '') {
		if (!$_POST['firstname'] || !$_POST['lastname'] || !$_POST['email']) {
			echo "<span class=errorSubscribe>You forgot to fill in data! <font color=red>(First Name, Last Name, E-mail)</font><br />";
			echo "Click <a href='javascript:history.go(-1)'>HERE</a> to return and correct your mistakes.</span>";
			echo "</div>";
			exit;
		}

		// Sanitize Passed Vars
		$_POST['firstname'] = addslashes($_POST['firstname']);
		$_POST['lastname'] = addslashes($_POST['lastname']);
		$_POST['email'] = addslashes($_POST['email']);
		$_POST['signdate'] = addslashes($_POST['signdate']);
		$_POST['showID'] = addslashes($_POST['showID']);
		$_POST['showName'] = addslashes($_POST['showName']);
		$_POST['ticket'] = addslashes($_POST['ticket']);

		$concert_id = $_POST['showName'];

		// Add Member
		mysqli_select_db($db, $database);
		$query = "INSERT INTO members (id, firstname, lastname, email, signdate) VALUES ('NULL', '$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[signdate]')" or die(mysqli_error($db));
		$result = mysqli_query($db, $query);

		if ($_POST['ticket']) {
			// Get Member Info
			$query = "SELECT * FROM members ORDER BY id DESC LIMIT 1" or die(mysqli_error($db));
			$result = mysqli_query($db, $query);
			while ($myrow = mysqli_fetch_array($result)) {
				$member_id = $myrow['id'];
				$member_firstname = $myrow['firstname'];
				$member_lastname = $myrow['lastname'];
				$member_email = $myrow['email'];
				$member_signdate = $myrow['signdate'];
			}

			// Add Ticket
			$query = "INSERT INTO ticket (id, members_id, concerts_id) VALUES ('NULL', '$member_id', '$_POST[showID]')" or die(mysqli_error($db));
			$result = mysqli_query($db, $query);
		}

		// Return Script
		print "<script>\n";
		print "self.location.href='javascript:top.close();';\n";
		print "</script>\n";
		die();
	}
	?>

	<?php
	// Cancel Action
	if ((isset($_POST['cancel'])) ? $_POST['cancel'] : '') {
		// Return Script
		print "<script>\n";
		print "self.location.href='index.php?id=$id';\n";
		print "</script>\n";
		die();
	}

	// Cancel Subscription
	if ((isset($_POST['cancelSubscribe'])) ? $_POST['cancelSubscribe'] : '') {
		// Return Script
		print "<script>\n";
		print "self.location.href='javascript:top.close();';\n";
		print "</script>\n";
		die();
	}

	// Check Password
	if (!$_POST['password']) {
		echo "<div align='center' class='errorBox'><table width=75% align=center><tr><td>";
		echo "<h1>$dbrecordtype Add Results</h1><br />";
		echo "You forgot to enter the <font color=red>password</font>!<br />";
		echo "Click <a href='javascript:history.go(-1)'>HERE</a> to return and correct your mistakes.";
		echo "</table></tr></td></div>";
		exit;
	} else if ($_POST['password'] != $addpassword) {
		echo "<div align='center' class='errorBox'><table width=75% align=center><tr><td>";
		echo "<h1>$dbrecordtype Add Results</h1><br />";
		echo "The password entered <font color=red>" . $password . "</font> is incorrect!<br />";
		echo "Click <a href='javascript:history.go(-1)'>HERE</a> to return and correct your mistakes.";
		echo "</table></tr></td></div>";
		exit;
	}

	// ADD RECORD
	if ((isset($_POST['addrecord'])) ? $_POST['addrecord'] : '') {

		if (!$_POST['bioimage'] || !$_POST['firstname'] || !$_POST['lastname']) {
			echo "<html><head><link href=css/musician_index.css rel=stylesheet type=text/css /></head>";
			echo "<div align='center' class='errorBox'><table width=75% align=center><tr><td>";
			echo "<h1>$dbrecordtype Add Results</h1><br />";
			echo "You must populate the <font color=red>Bio Image, First Name and Last Name fields</font> !<br />";
			echo "Click <a href='javascript:history.go(-1)'>HERE</a> to return and correct your mistakes.";
			echo "</table></tr></td></div>";
			exit;
		}

		// Format data for MySQL
		$_POST['bioimage'] = addslashes($_POST['bioimage']);
		$_POST['firstname'] = addslashes($_POST['firstname']);
		$_POST['lastname'] = addslashes($_POST['lastname']);
		$_POST['details'] = addslashes($_POST['details']);
		$_POST['tune1'] = addslashes($_POST['tune1']);
		$_POST['tune2'] = addslashes($_POST['tune2']);
		$_POST['tune3'] = addslashes($_POST['tune3']);
		$_POST['tune4'] = addslashes($_POST['tune4']);
		$_POST['biotext'] = addslashes($_POST['biotext']);
		$_POST['geartext'] = addslashes($_POST['geartext']);
		$_POST['website'] = addslashes($_POST['website']);
		$_POST['credits'] = addslashes($_POST['credits']);
		$_POST['lastupdated'] = addslashes($_POST['lastupdated']);

		mysqli_select_db($db, $database);
		$query = "INSERT INTO $dbtable (id, bioimage, firstname, lastname, details, tune1, tune2, tune3, tune4, biotext, geartext, website, credits, lastupdated) VALUES ('NULL', '$_POST[bioimage]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[details]', '$_POST[tune1]', '$_POST[tune2]', '$_POST[tune3]', '$_POST[tune4]', '$_POST[biotext]', '$_POST[geartext]', '$_POST[website]', '$_POST[credits]', '$_POST[lastupdated]')" or die(mysqli_error($db));
		$result = mysqli_query($db, $query);

		// Return Script
		print "<script>\n";
		print "self.location.href='index.php';\n";
		print "</script>\n";
		die();
	}
	// END ADD RECORD

	?>

	<br />
</body>

</html>
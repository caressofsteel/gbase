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
include 'include/prompt.php';
include 'include/popwindow.php';

// Capture passed ID
$id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : '';
?>

<html>

<head>
	<title>Edit <?php echo $dbrecordtype; ?> ID #<?php echo $id; ?></title>
	<?php echo $style1; ?>
</head>

<body>
	<?php

	if ((isset($_REQUEST['cancel'])) ? $_REQUEST['cancel'] : '') {
		// Return Script
		print "<script>\n";
		print "self.location.href='view.php?id=$id';\n";
		print "</script>\n";
		die();
	}

	if ((isset($_REQUEST['delete'])) ? $_REQUEST['delete'] : '') {
		// Check Password
		if (!$_POST['password']) {
			echo "<div align='center' class='errorBox'><table width=75% align=center><tr><td>";
			echo "<h1>$dbrecordtype Entry Results</h1><br />";
			echo "You forgot to enter the <font color=red>password</font>!<br />";
			echo "Click <a href='javascript:history.go(-1)'>HERE</a>
 to return and correct your mistakes.";
			echo "</table></tr></td></div>";
			exit;
			exit;
		} else if ($_POST['password'] != $delpassword) {
			echo "<div align='center' class='errorBox'><table width=75% align=center><tr><td>";
			echo "<h1>$dbrecordtype Delete Results</h1><br />";
			echo "The password entered <font color=red>" . $password . "</font> is incorrect!<br />";
			echo "Click <a href='javascript:history.go(-1)'>HERE</a>
 to return and correct your mistakes.";
			echo "</table></tr></td></div>";
			exit;
		}

		mysqli_select_db($db, $database);
		mysqli_query($db, "DELETE FROM $dbtable WHERE id=$id", $db);

		// Return Script
		print "<script>\n";
		print "self.location.href='index.php?id=$id';\n";
		print "</script>\n";
		die();
	}

	if ((isset($_REQUEST['update'])) ? $_REQUEST['update'] : '') {
		// Check Password
		if (!$_POST['password']) {
			echo "<div align='center' class='errorBox'><table width=75% align=center><tr><td>";
			echo "<h1>$dbrecordtype Update Results</h1><br />";
			echo "You forgot to enter the <font color=red>password</font>!<br />";
			echo "Click <a href='javascript:history.go(-1)'>HERE</a> to return and correct your mistakes.";
			echo "</table></tr></td></div>";
			exit;
			exit;
		} else if ($_POST['password'] != $editpassword) {
			echo "<div align='center' class='errorBox'><table width=75% align=center><tr><td>";
			echo "<h1>$dbrecordtype Update Results</h1><br />";
			echo "The password entered <font color=red>" . $password . "</font> is incorrect!<br />";
			echo "Click <a href='javascript:history.go(-1)'>HERE</a> to return and correct your mistakes.";
			echo "</table></tr></td></div>";
			exit;
		}

		// Check data entry
		if (!$_POST['bioimage'] || !$_POST['firstname'] || !$_POST['lastname']) {
			echo "<html><head><link href=css/musician_index.css rel=stylesheet type=text/css /></head>";
			echo "<div align='center' class='errorBox'><table width=75% align=center><tr><td>";
			echo "<h1>$dbrecordtype Update Results</h1><br />";
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
		$query = "UPDATE $dbtable SET bioimage='$_POST[bioimage]', firstname='$_POST[firstname]', lastname='$_POST[lastname]', details='$_POST[details]', tune1='$_POST[tune1]', tune2='$_POST[tune2]', tune3='$_POST[tune3]', tune4='$_POST[tune4]', biotext='$_POST[biotext]', geartext='$_POST[geartext]', website='$_POST[website]', credits='$_POST[credits]', lastupdated='$_POST[lastupdated]' WHERE id=$id";
		$result = mysqli_query($db, $query);

		// Return Script
		print "<script>\n";
		print "self.location.href='view.php?id=$id';\n";
		print "</script>\n";
		die();
	}
	// END UPDATE

	include 'include/dbconnect.php';

	// Assign passed ID
	$id = $_GET['id'];
	$query  = "SELECT * FROM $dbtable WHERE id=$id" or die(mysqli_error($db));
	$result = mysqli_query($db, $query);

	while ($myrow = mysqli_fetch_array($result)) {
		$bioimage = $myrow["bioimage"];
		$firstname = $myrow["firstname"];
		$lastname = $myrow["lastname"];
		$details = $myrow["details"];
		$tune1 = $myrow["tune1"];
		$tune2 = $myrow["tune2"];
		$tune3 = $myrow["tune3"];
		$tune4 = $myrow["tune4"];
		$biotext = $myrow["biotext"];
		$geartext = $myrow["geartext"];
		$website = $myrow["website"];
		$credits = $myrow["credits"];
		$lastupdated = $myrow["lastupdated"];
	}

	// Add header
	include 'include/header.php';
	?>


	<!-- Delete Prompt -->
	<script language="JavaScript">
		var bOK;

		function show() {
			if (!bOK) {
				bOK = confirm("Are you sure you want to DELETE this record?");
			}
			if (bOK) {
				return;
			} else {
				return false;
			}
		}
	</script>

	<table border="0" align="center">
		<tr>
			<td>
				<center>
					<p>
						<span class="small"><a href="index.php">Home</a> | <a href="add.php">Add</a> | <a onclick="PopupCenterDual('viewsubscribers.php','Subscribe','600','420'); " href="javascript:void(0);">Subscribe</a> | <a onclick="PopupCenterDual('about.php','About','600','320'); " href="javascript:void(0);">About</a></span>
					</p>
				</center>
			</td>
		</tr>
	</table>
	<div align="center"><img src="images/section/label-edit.gif"></div>
	<form name="form1" id="form1" action="<?php echo $_SERVER['PHP_SELF'] ?><?php echo "?id=$id" ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<h3>
			Editing <?php echo $firstname; ?> <?php echo $lastname; ?>
			<div class="smalldark">
				[ <?php echo $dbrecordtype; ?> ID #<?php echo $id; ?> ]
			</div>
		</h3>

		</center>
		<table align="center">
			<tr>
				<td>
					<table width="100%" border="0">
						<tr align="left" valign="top">
							<td>Password:</td>
							<td><input name="password" type="text" id="password" />
								<input type="hidden" name="lastupdated" type="text" id="lastupdated" value="<?php echo $date_time; ?>" />
							</td>
						</tr>
						<tr align="left" valign="top">
							<td>Image:</td>
							<td><input value="<?php echo $bioimage; ?>" name="bioimage" type="text" id="bioimage" /> 
							<!-- <input name="Upload" type="submit" id="Upload" value="Upload" /> -->
							</td>
						</tr>
						<tr align="left" valign="top">
							<td width="15%">First Name:</td>
							<td width="85%"><input value="<?php echo $firstname; ?>" name="firstname" type="text" id="firstname" /></td>
						</tr>
						<tr align="left" valign="top">
							<td>Last Name:</td>
							<td><input value="<?php echo $lastname; ?>" name="lastname" type="text" id="lastname" />
							</td>
						</tr>
						<tr align="left" valign="top">
							<td width="15%">Details:</td>
							<td width="85%"><textarea rows="5" name="details" cols="75" id="details"><?php echo $details; ?></textarea></td>
						</tr>
						<tr align="left" valign="top">
							<td>Music Picks:</td>
							<td><input value="<?php echo $tune1; ?>" name="tune1" type="text" id="tune1" />
								<input value="<?php echo $tune2; ?>" name="tune2" type="text" id="tune2" />
								<input value="<?php echo $tune3; ?>" name="tune3" type="text" id="tune3" />
								<input value="<?php echo $tune4; ?>" name="tune4" type="text" id="tune4" />
							</td>
						</tr>
						<tr align="left" valign="top">
							<td width="15%">Biography:</td>
							<td width="85%"><textarea name="biotext" cols="75" rows="10" id="textarea"><?php echo $biotext; ?></textarea></td>
						</tr>
						<tr align="left" valign="top">
							<td width="15%">Gear:</td>
							<td width="85%"><textarea name="geartext" cols="75" rows="5" id="geartext"><?php echo $geartext; ?></textarea>
							</td>
						</tr>
						<tr align="left" valign="top">
							<td>Official Website:</td>
							<td><input value="<?php echo $website; ?>" name="website" type="text" id="website" />
							</td>
						</tr>
						<tr align="left" valign="top">
							<td width="15%">Credits:</td>
							<td width="85%"><textarea name="credits" cols="75" rows="2" id="credits"><?php echo $credits; ?></textarea></td>
						</tr>
					</table>
					<center>
						<br />
						<input type="submit" name="update" value="Update Record" />
						<input onClick="return show();" type="submit" name="delete" value="Delete Record" />
						<input type="submit" name="cancel" value="Cancel" />
					</center>
	</form>

	</td>
	</tr>
	</table>

	<?php
	// Add Footer
	include 'include/footer.php';
	?>

</body>

</html>
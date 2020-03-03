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

// FUNCTIONS

// Display all the guitarists in the database. Wrap at a specific number of cells. 
function renderimages()
{
	include 'include/dbconnect.php';
	$counter = 0;
	$result = mysqli_query($db, "SELECT * FROM $dbtable ORDER BY lastname ASC;");
	while ($row = mysqli_fetch_array($result)) {
		$counter = $counter + 1;
		$id = $row["id"];
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$bioimage = $row["bioimage"];

		if ($counter > $rowcount) {
			// That's a wrap...
			$counter = 0;
			$counter += 1;
			echo "</tr>";
		}

		// Original Image Size: 200x136
		echo "<td align='center'><a href='view.php?id=$id'><img alt='$firstname $lastname' height=100 width=68 src=$bioimagepath/$bioimage /></a><br />";
		echo "<span class='smalldark'><center>";
		echo $firstname;
		echo "<br />";
		echo $lastname;
		echo "</center></span>";
		echo "<br /></td>";
	}
	//ECHO $dbtable;
};

// Search the database
function search($searchtext)
{
	include 'include/dbconnect.php';

	$searchtext = addslashes($searchtext);
	$query = "SELECT * from $dbtable WHERE firstname OR lastname OR biotext LIKE '%" . $searchtext . "%'";
	$result = mysqli_query($db, $query);
	$num_results = mysqli_num_rows($result);
	echo "<center>";
	echo "<h3>" . $dbrecordtype . " Search Results</h3>";
	echo "Number of records found: " . $num_results . "<hr>";
	echo "</center>";

	while ($row = mysqli_fetch_array($result)) {
		$counter += 1;
		$id = $row["id"];
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$bioimage = $row["bioimage"];

		if ($counter > 4) {
			//echo $counter;
			$counter = 0;
			$counter += 1;
			echo "</tr>";
		}

		echo "<td width='7%' height=''56' valign=top><a href='view.php?id=$id'><img alt='$firstname $lastname' height=50 width=34 src=$bioimagepath/$bioimage /></a></td>";
		echo "<td>";
		//			 echo "<p><strong>".$id.". ";
		echo "<a href='view.php?id=$id'>";
		echo stripslashes($row["firstname"]);
		echo "&nbsp;";
		echo stripslashes($row["lastname"]);
		echo "</a></strong>";
		echo "<br><span class='small'>Last Update: ";
		echo stripslashes($row["lastupdated"]);
		echo "</span></p>";
		echo "</center>";
		echo "<br /></td>";
	}
};

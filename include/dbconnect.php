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
include("include/config.php");

//Connect using PDO.
$db = mysqli_connect($hostname, $user, $pass, $database);

// If database doesn't exist, DIE and log error
if (!$db) {
	echo "Error: Could not connect to database.  Please try again later.";
	exit;
}

$database = mysqli_select_db($db, $database);
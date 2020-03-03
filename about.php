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
// include 'include/norclick.php';
//include 'include/nohighlight.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta name="generator" content="<?php echo $metaGenerator; ?>">
    <meta name="author" content="<?php echo $metaAuthor; ?>">
    <meta name="keywords" content="<?php echo $metaKeywords; ?>">
    <meta name="description" content="<?php echo $metaDescription; ?>">
    <?php echo $style2; ?>
</head>

<center><img src="<?php echo $sectionimagepath; ?>/<?php echo $welcomeimage; ?>"></center>
<table align="center" width="75%">
    <tr>
        <td valign="top">
            <img src="<?php echo $sectionimagepath; ?>/<?php echo $aboutlogo; ?>" align="left" border="1">
        </td>
        <td>&nbsp;&nbsp;
        </td>
        <td>
            <p class="smalldark">
                Welcome to the GBase.com guitarist database. This project started as a learning experience in 2002. The point of this project was to create a simple database system using PHP/MySQL.
                <br /><br />
                This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
                <br /><br />
                If you find this project useful or
                please give credit to (<a href="mailto:caressofsteel@protonmail.com?subject=GBase.com">David Rodgers</a>). There are no warranties expressed or implied so use at your own risk.
            </p>
        </td>
    </tr>
</table>
<center>
    <a href="javascript:top.close()"><img src="<?php echo $sectionimagepath; ?>/<?php echo $closeimage; ?>" border=0 alt="Close window"></a>
</center>
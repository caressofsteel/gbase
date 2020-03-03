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

// DATABASE INFO

			// Config
			$database = "app_gbase";
			$user = "root";
			$pass = "";
			$hostname = "localhost";

			// Tables
			$dbtable = "guitarists";
			$requests = "grequests";
			$reports = "greports";

			// Passwords (Hash/Salt Needed!)
			$addpassword = "add";
			$editpassword = "edit";
			$delpassword = "delete";

// SITE OPTIONS			

			// META
			$metaAuthor = "David Rodgers";
			$metaGenerator  = "David Rodgers";
			$metaDescription  = "GBase.com: A Guitarist Database";      
		    $metaKeywords = "gbase, gbase.com, guitar, guitarist, gear, music, music theory, chords, scales, modes, caressofsteel, caressofsteel@protonmail.com";
      
			// Titles & Notices
			$dbrecordtype = "Guitarist";
			$title = "GBase.com: A Guitarist Database";
			$pageheader = "GBase.com";
			$copyright = "GBase.com &copy;2002 <a target='_blank' href=mailto:caressofsteel@protonmail.com?subject=GBase.com>David Rodgers</a>";
			$rowcount = "9";
					
			// Image Paths
			$bioimagepath = "images/musicians";    // No Trailing Slash!
			$sectionimagepath = "images/section";  // No Trailing Slash!
			$bulletimagepath = "images/bullet";
			$bgimagepath = "images/bg";
			$iconimagepath = "images/icons";
			
			// Graphics
			$aboutlogo = "aboutlogo.gif";
			$sectionimage1 = "label-music.gif";
			$sectionimage2 = "label-bio.gif";
			$sectionimage3 = "label-gear.gif";
			$sectionimage4 = "label-links.gif";
			$sectionimage5 = "label-credits.gif";
			$bulletimage = "bullet-yellow.gif";
			$iconimage = "icon-amp.png";
			$logoimage = "logo2.png";
			$closeimage = "close.gif";
			$welcomeimage = "welcome.gif";
			
			// Page Styles
			$style1 = "
                 <link href='css/gbase.css' rel='stylesheet' type='text/css' />
                 <!--[if IE]>
                 <link rel='stylesheet' type='text/css' href='css/gbase_ie.css' />
                 <script defer type=text/javascript src=include/pngfix.php></script>
                 <![endif]-->
                 ";

			// Page Styles
			$style2 = "
                 <link href='css/gbase_alt.css' rel='stylesheet' type='text/css' />
                 <!--[if IE]>
                 <link rel='stylesheet' type='text/css' href='css/gbase_alt_ie.css' />
                 <script defer type=text/javascript src=include/pngfix.php></script>                 
                 <![endif]-->
                 ";
// UTILITY VARS

			// Time/Date
      //$date_time = date(' F \ d,\ Y\ \ | \ g:i A'); 	
			$date_time = date(' F \ d,\ Y\ \ @ \ g:i A'); 	
			$date = date(' F \ d,\ Y');
			$time = date('g:i A');
       
      // Breakpoint
      $redflag = "<b><font color=red size=3>RED FLAG</font></b><br>";
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
?>

<!-- // HEADER -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta name="generator" content="<?php echo $metaGenerator; ?>">
    <meta name="author" content="<?php echo $metaAuthor; ?>">
    <meta name="keywords" content="<?php echo $metaKeywords; ?>">
    <meta name="description" content="<?php echo $metaDescription; ?>">

    <?php
    // Header Includes
    //include 'include/norclick.php';
    //include 'include/nohighlight.php';
    include 'include/prompt.php';
    include 'include/popwindow.php';
    echo $style1;

    ?>
    <a name="Top">
</head>

<body>

    <div class="topLogo"><a href="index.php"><img border="0" src="<?php echo $sectionimagepath; ?>/<?php echo $logoimage; ?>"></a></div>

    <div class="border">
        <div class="container">
            <!-- // END HEADER -->
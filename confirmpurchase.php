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
$showName = ((isset($_REQUEST['showName'])) ? $_REQUEST['showName'] : '');
$showID = ((isset($_REQUEST['showID'])) ? $_REQUEST['showID'] : '');
$confirmed = ((isset($_REQUEST['confirmed'])) ? $_REQUEST['confirmed'] : '');

// Get chosen show
$query  = "SELECT * FROM concerts WHERE id = $showID" or die(mysqli_error($db));
$result = mysqli_query($db, $query);

while ($myrow = mysqli_fetch_array($result)) {
  $showID = $myrow['id'];
  $showName = $myrow["showName"];
}
?>

<a name="Top"></a>

<body>

  <!-- Display Info -->
  <?php

  if (!$confirmed) {
  ?>

    <div align="center"><img src="images/section/label-confirm.gif"></div>
    <div align="center">
      <h3>You are about to purchase a ticket for:</h3>
      <h2><?php echo $showName ?></h2>
      <form name="form1" id="form1" method="post" action="pay.php?confirmed=1&showID=<?php echo $showID; ?>&showName=<?php echo $showName; ?>">
        <div align="center">
          <input type="submit" name="signup" value="Submit" />
          <input type="submit" name="cancelSubscribe" value="Cancel" />
          <input type="hidden" id="showName" name="showName" value="<?php echo $showName ?>">
          <input type="hidden" id="showID" name="showID" value="<?php echo $showID ?>">
        </div>

      <?php
    } else {
      ?>

        <div align="center">
          <img src="images/section/label-signup.gif">
          <br />
          <span class="smalldark">Your purchase has been confirmed. Please enter the data below to be registered as a subscriber.</span>
          <br /><br />
          <form name="form1" id="form1" method="post" action="process.php">
            <table align="center" width="50%" border="0">
              <tr align="left" valign="top">
                <td width="50%">First Name:</td>
                <td width="50%">
                  <input name="firstname" type="text" id="firstname" />
                </td>
              </tr>
              <tr align="left" valign="top">
                <td>Last Name:</td>
                <td><input name="lastname" type="text" id="lastname" />
                </td>
              </tr>
              <tr align="left" valign="top">
                <td width="50%">Email:</td>
                <td>
                  <input name="email" type="text" id="email" />
                  <input type="hidden" id="signdate" name="signdate" value="<?php echo $date ?>">
              </tr>
              <tr align="left" valign="top">
                <td>Ticket:</td>
                <td width="50%"><?php echo $showName; ?></td>
                <input type="hidden" id="showID" name="showID" value="<?php echo $showID ?>">
                <input type="hidden" id="showName" name="showName" value="<?php echo $showName ?>">
                <input type="hidden" id="ticket" name="ticket" value="1">
              </tr>
            </table>

            <center>
              <br />
              <input type="submit" name="signup" value="Submit" />
              <input type="submit" name="cancelSubscribe" value="Cancel" />
            </center>
          </form>

          </td>
          </tr>
          </table>

        <?php
      }
        ?>

</body>

</html>
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

// Get guitarist data
$query  = "SELECT * FROM members" or die(mysqli_error($db));
$result = mysqli_query($db, $query);
?>

<div align="center">
  <img src="images/section/label-member.gif">
  <hr>

  <table border="0" width="100%">
    <tr>
      <td align="left">ID</td>
      <td align="left">First</td>
      <td align="left">Last</td>
      <td align="left">Email</td>
      <td align="left">SignUp Date</td>
    </tr>
    <tr>

      <?php
      while ($myrow = mysqli_fetch_array($result)) {
        $id = $myrow['id'];
        $firstname = $myrow["firstname"];
        $lastname = $myrow["lastname"];
        $signdate = $myrow["signdate"];
        $email = $myrow["email"];

        echo "<tr>";
        echo "<td align='left'>$id</td>";
        echo "<td align='left'>$firstname</td>";
        echo "<td align='left'>$lastname</td>";
        echo "<td align='left'>$email</td>";
        echo "<td align='left'>$signdate</td>";
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
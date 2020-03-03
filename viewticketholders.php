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

mysqli_select_db($db, $database);
$query = "
SELECT DISTINCT *, members.firstname AS cfname, members.lastname AS clname, guitarists.firstname AS gfname, guitarists.lastname AS glname
FROM members, guitarists, ticket, concerts, performers
WHERE ticket.members_id = members.id
AND ticket.concerts_id = concerts.id
AND performers.guitarists_id = guitarists.id
AND guitarists_id <> 10;
" or die(mysqli_error($db));
if (!$result = mysqli_query($db, $query)) {
  die(mysqli_error($db)($database));
};
?>

<div align="center">
  <img src="images/section/label-tickets.gif">
  <hr>

  <table border="0" width="100%">
    <tr>
      <td align="left">First</td>
      <td align="left">Last</td>
      <td align="left">Email</td>
      <td align="left">Show</td>
    </tr>
    <tr>
      <?php
      while ($myrow = mysqli_fetch_array($result)) {
        $cfname = $myrow["cfname"];
        $clname = $myrow["clname"];
        $mail = $myrow["email"];
        $show = $myrow["showName"];

        echo "<tr>";
        echo "<td align='left'>$cfname</td>";
        echo "<td align='left'>$clname</td>";
        echo "<td align='left'>$mail</td>";
        echo "<td align='left'>$show</td>";
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
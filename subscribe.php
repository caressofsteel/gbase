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
?>

<a name="Top"></a>

<body>
  <div align="center"><img src="images/section/label-signup.gif"></div>
  <br />
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
        <td width="15%">Email:</td>
        <td>
          <input name="email" type="text" id="email" />
          <input type="hidden" id="signdate" name="signdate" value="<?php echo $date ?>">
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

  <br />
  <center>
    <a href="javascript:top.close()"><img src="<?php echo $sectionimagepath; ?>/<?php echo $closeimage; ?>" border=0 alt="Close window"></a>
  </center>

</body>

</html>
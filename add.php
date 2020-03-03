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
include 'include/header.php';
?>

<a name="Top"></a>

<table border="0" align="center">
  <tr>
    <td>
      <center>
        <p>
          <span class="small"><a href="index.php">Home</a> | <a href="about.php" onclick="NewWindow (this.href,'about','700','315','yes');return false">About</a></span>
        </p>
      </center>
    </td>
  </tr>
</table>

<body>
  <center><img src="images/section/label-add.gif"></center>
  <table align="center">
    <tr>
      <td>
        <form name="form1" id="form1" method="post" action="process.php">
          <table width="100%" border="0">
            <tr align="left" valign="top">
              <td>Password:</td>
              <td><input name="password" type="text" id="password" />
                <input type="hidden" name="lastupdated" type="text" id="lastupdated" value="<?php echo $date_time; ?>" />
              </td>
            </tr>
            <tr align="left" valign="top">
              <td>Image Link:</td>
              <td><input name="bioimage" type="text" id="bioimage" /> 
              <!-- TODO: ADD IMAGE UPLOAD<input name="Upload" type="submit" id="Upload" value="Upload" /> -->
              </td>
            </tr>
            <tr align="left" valign="top">
              <td width="15%">First Name:</td>
              <td width="85%"><input name="firstname" type="text" id="firstname" /></td>
            </tr>
            <tr align="left" valign="top">
              <td>Last Name:</td>
              <td><input name="lastname" type="text" id="lastname" />
              </td>
            </tr>
            <tr align="left" valign="top">
              <td width="15%">Details:</td>
              <td width="85%"><textarea rows="5" name="details" cols="75" id="details"></textarea></td>
            </tr>
            <tr align="left" valign="top">
              <td>Music Picks:</td>
              <td><input name="tune1" type="text" id="tune1" />
                <input name="tune2" type="text" id="tune2" />
                <input name="tune3" type="text" id="tune3" />
                <input name="tune4" type="text" id="tune4" />
              </td>
            </tr>
            <tr align="left" valign="top">
              <td width="15%">Biography:</td>
              <td width="85%"><textarea name="biotext" cols="75" rows="10" id="textarea"></textarea></td>
            </tr>
            <tr align="left" valign="top">
              <td width="15%">Gear:</td>
              <td width="85%"><textarea name="geartext" cols="75" rows="5" id="geartext"></textarea>
              </td>
            </tr>
            <tr align="left" valign="top">
              <td>Official Website:</td>
              <td><input name="website" type="text" id="website" /></td>
            </tr>
            <tr align="left" valign="top">
              <td width="15%">Bio Credits:</td>
              <td width="85%"><textarea name="credits" cols="75" rows="2" id="credits"></textarea></td>
            </tr>
          </table>
          <center>
            <input type="submit" name="addrecord" value="Submit" /> <input type="submit" name="cancel" value="Cancel" />
          </center>
        </form>

      </td>
    </tr>
  </table>

  <?
  include 'include/footer.php';
  ?>

</body>

</html>
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
include 'include/dbconnect.php';

// Capture passed ID
$id = $_GET['id'];

// Get guitarist data
$query  = "SELECT * FROM $dbtable WHERE id=$id" or die(mysqli_error($db));
$result = mysqli_query($db, $query);
while ($myrow = mysqli_fetch_array($result)) {
  $id = $myrow['id'];
  $bioimage = $myrow['bioimage'];
  $firstname = $myrow["firstname"];
  $lastname = $myrow["lastname"];
  $details = $myrow["details"];
  $tune1 = $myrow["tune1"];
  $tune2 = $myrow["tune2"];
  $tune3 = $myrow["tune3"];
  $tune4 = $myrow["tune4"];
  $tune5 = $myrow["tune4"];
  $biotext = $myrow["biotext"];
  $geartext = $myrow["geartext"];
  $website = $myrow["website"];
  $credits = $myrow["credits"];
  $lastupdated = $myrow["lastupdated"];
  $views = $myrow["views"];
  $location = $myrow["location"];
}

// DISABLED FOR TESTING
// Track Visitor To Avoid Multiple "Views" Increments
//$IP = getenv("REMOTE_ADDR");	
$IP = "127.0.0.1";

if ($IP != $location) {
  // If viewer location different, increase record views.
  $views += 1;
  mysqli_select_db($db, $database);
  $query = "UPDATE $dbtable SET views='$views' WHERE id=$id";
  $result = mysqli_query($db, $query);
}

// Set Last Viewer Location
mysqli_select_db($db, $database);
$query = "UPDATE $dbtable SET location='$IP' WHERE id=$id";
$result = mysqli_query($db, $query);

// Add header
include 'include/header.php';
?>
<!-- //  -->
<table align="center">
  <tr>
    <td>

      <!-- // TOP MENU -->
      <table border="0" align="center">
        <tr>
          <td>
            <center>
              <p>
                <span class="small"><a href="index.php">Home</a> | <a href="add.php">Add</a> | <a href="edit.php?id=<?php echo $id; ?>">Edit</a> | <a onclick="PopupCenterDual('viewsubscribers.php','Subscribe','600','420'); " href="javascript:void(0);">Subscribe</a> | <a onclick="PopupCenterDual('about.php','About','600','320'); " href="javascript:void(0);">About</a></span>
              </p>
            </center>
          </td>
        </tr>
      </table>
      <!-- // END TOP MENU -->

      <br />

      <table width="100%" border="0" align="center">
        <tr>
          <td>
            <div align="center">
              <table width="90%" border="0">
                <tr>
                  <td width="136" rowspan="2">
                    <table width="136" height="200" border="0">
                      <tr>
                        <td width="136" height="200" valign="top">

                          <!-- // BIO IMAGE FRAME -->
                          <table width="23%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="5%"><img src="images/frame/frame-cornertopleft.gif" width="20" height="20" /></td>
                              <td width="2%"><img src="images/frame/frame-top.gif" width="136" height="20" /></td>
                              <td width="93%"><img src="images/frame/frame-cornertopright.gif" width="20" height="20" /></td>
                            </tr>
                            <tr>
                              <td><img src="images/frame/frame-sideleft.gif" width="20" height="200" /></td>
                              <td valign="top"><img src="images/musicians/<?php echo $bioimage; ?>"></td>
                              <td valign="top"><img src="images/frame/frame-sideright.gif" width="20" height="200" /></td>
                            </tr>
                            <tr>
                              <td><img src="images/frame/frame-cornerbottomleft.gif" width="20" height="20" /></td>
                              <td><img src="images/frame/frame-bottom.gif" width="136" height="20" /></td>
                              <td><img src="images/frame/frame-cornerbottomright.gif" width="20" height="20" /></td>
                            </tr>
                          </table>
                          <!-- // END BIO IMAGE FRAME -->

                        </td>
                      </tr>
                    </table>
                  </td>
                  <td valign="top" align=left>&nbsp;</td>
                  <td valign="top">
                    <center><span class="musician-name"><?php echo $firstname; ?> <?php echo $lastname; ?></span>
                      <br />
                      <span class="smalldark"><a href="#music">Music</a> | <a href="#bio">Biography</a> | <a href="#gear">Gear</a> | <a href="#links">Links</a> | <a href="#credits">Credits</a></span>
                      <br />
                    </center>
                    <hr>
                    <div class="details" align="center"><?php echo $details; ?></div>
                    <hr>
                    <div align="center"><span class="smalldark">Record last updated on <?php echo $lastupdated; ?> | Total Views: <?php echo $views; ?></span></div>
                  </td>
                </tr>
                <tr>
                  <td width="10"></td>
                  <td valign="top">&nbsp;</td>
                </tr>
              </table>

              <!-- MUSIC PICKS -->
              <a name="music"></a>
              <table width="90%" border="0">
                <tr>
                  <td>
                    <img align="left" border="0" src="<?php echo $sectionimagepath; ?>/<?php echo $sectionimage1; ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <center>
                      <br />
                      <a href="http://www.google.com/search?sourceid=navclient&ie=UTF-8&oe=UTF-8&q=<?php echo $firstname; ?> <?php echo $lastname; ?> %22<?php echo $tune1; ?>%22" target="_blank"><?php echo $tune1; ?></a>
                      &nbsp;&nbsp;&nbsp;<img border="0" src="<?php echo $bulletimagepath; ?>/<?php echo $bulletimage; ?>">&nbsp;&nbsp;&nbsp;
                      <a href="http://www.google.com/search?sourceid=navclient&ie=UTF-8&oe=UTF-8&q=<?php echo $firstname; ?> <?php echo $lastname; ?> %22<?php echo $tune2; ?>%22" target="_blank"><?php echo $tune2; ?></a>
                      &nbsp;&nbsp;&nbsp;<img border="0" src="<?php echo $bulletimagepath; ?>/<?php echo $bulletimage; ?>">&nbsp;&nbsp;&nbsp;
                      <a href="http://www.google.com/search?sourceid=navclient&ie=UTF-8&oe=UTF-8&q=<?php echo $firstname; ?> <?php echo $lastname; ?> %22<?php echo $tune3; ?>%22" target="_blank"><?php echo $tune3; ?></a>
                      &nbsp;&nbsp;&nbsp;<img border="0" src="<?php echo $bulletimagepath; ?>/<?php echo $bulletimage; ?>">&nbsp;&nbsp;&nbsp;
                      <a href="http://www.google.com/search?sourceid=navclient&ie=UTF-8&oe=UTF-8&q=<?php echo $firstname; ?> <?php echo $lastname; ?> %22<?php echo $tune4; ?>%22" target="_blank"><?php echo $tune4; ?></a>
                    </center>
                  </td>
                </tr>
              </table>
              <br />
              <!-- // END MUSIC PICKS -->

              <!-- // BIO SECTION -->
              <a name="bio"></a>
              <table width="90%" border="0">
                <tr>
                  <td>
                    <img align="left" border="0" src="<?php echo $sectionimagepath; ?>/<?php echo $sectionimage2; ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>
                      <span class="maintext"><?php echo $biotext; ?></span>
                    </p>
                  </td>
                </tr>
              </table>
              <!-- // END BIO -->

              <!-- // GEAR -->
              <a name="gear"></a>
              <table width="90%" border="0">
                <tr>
                  <td>
                    <img align="left" border="0" src="<?php echo $sectionimagepath; ?>/<?php echo $sectionimage3; ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <ul><?php echo $geartext; ?></ul>
                  </td>
                </tr>
              </table>
              <!-- // END GEAR -->

              <!-- // LINKS -->
              <a name="links"></a>
              <table width="90%" border="0">
                <tr>
                  <td>
                    <img align="left" border="0" src="<?php echo $sectionimagepath; ?>/<?php echo $sectionimage4; ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <center>
                      <br />
                      <a href="http://<?php echo $website; ?>" target="_blank">Official Website</a>&nbsp;&nbsp;&nbsp;
                      <img border="0" src="<?php echo $bulletimagepath; ?>/<?php echo $bulletimage; ?>">&nbsp;&nbsp;&nbsp;
                      <a href="http://www.google.com/search?sourceid=navclient&ie=UTF-8&oe=UTF-8&q=<?php echo $firstname; ?>+<?php echo $lastname; ?>" target="_blank">More Information</a>&nbsp;&nbsp;&nbsp;
                      <img border="0" src="<?php echo $bulletimagepath; ?>/<?php echo $bulletimage; ?>">&nbsp;&nbsp;&nbsp;
                      <a href="http://images.google.com/images?hl=en&lr=&ie=UTF-8&oe=UTF-8&q=<?php echo $firstname; ?>+<?php echo $lastname; ?>&sa=N&tab=wi" target="_blank">More Pictures</a>
                    </center>
                  </td>
                </tr>
              </table>
              <br />
              <!-- // END LINKS -->

              <!-- // CREDITS -->
              <a name="credits"></a>
              <table width="90%" border="0">
                <tr>
                  <td>
                    <img align="left" border="0" src="<?php echo $sectionimagepath; ?>/<?php echo $sectionimage5; ?>">
                    <br /><br /><br />
                    <span class="smalldark"><?php echo $credits; ?></span>
                  </td>
                </tr>
              </table>
              <!-- // END CREDITS -->
            </div>
          </td>
        </tr>
      </table>

      <div class="smalldark">.: <a href='#Top'>Top</a> :.</div>
      <?php
      // Add footer
      include 'include/footer.php';
      ?>

      </body>

      </html>
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

<script>
    var bOK;

    function validaterec() {
        if (!bOK) {
            bOK = confirm("Are you sure you want to submit?\n\nThis form will autocheck for\nerrors or missing data.");
        }
        if (bOK) {
            return signCheck();
        } else {
            return false;
        }
    }
</script>
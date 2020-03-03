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
    function disableselect(e) {
        return false
    }

    function reEnable() {
        return true
    }

    //if IE4+
    document.onselectstart = new Function("return false")

    //if NS6
    if (window.sidebar) {
        document.onmousedown = disableselect
        document.onclick = reEnable
    }
</script>
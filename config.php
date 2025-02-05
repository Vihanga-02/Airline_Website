<?php

    $con=new mysqli("localhost","root","","FLYHIGH");

    if ( $con-> connect_error)
    {
        die("connection failed ".$con->connect_error);
    }
?>
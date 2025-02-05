<?php
    // Database connection for iwtsuvinya
    $conn = mysqli_connect("localhost", "root", "", "FLYHIGH");

    // Check connection
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
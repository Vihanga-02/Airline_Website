<?php
    $conn = mysqli_connect(hostname: "localhost",username: "root",password: "",database: "FLYHIGH");
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
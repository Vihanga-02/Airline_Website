<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php'; 

// Ensure form data is set before using it
if (isset($_POST["flight-name"], $_POST["Airline"], $_POST["Capacity"], $_POST["Description"])) {
    $F_Name = $_POST["flight-name"];
    $Air = $_POST["Airline"];
    $Cap = $_POST["Capacity"];
    $Desc = $_POST["Description"];
    
    // Insert data into the 'flight' table without specifying 'flight_id'
    $sql = "INSERT INTO flight (plane_name, airline, capacity, description) 
            VALUES ('$F_Name', '$Air', '$Cap', '$Desc')";
    
    if ($con->query($sql)) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . $con->error;
    }
} else {
    echo "Error: Missing form data!";
}

$con->close();
?>
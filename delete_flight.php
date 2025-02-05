<?php
require 'config.php';

if (isset($_GET['id'])) {
    $flight_id = $_GET['id'];

    // Delete the flight from the database
    $sql = "DELETE FROM flight WHERE flight_id = '$flight_id'";

    if ($con->query($sql) === TRUE) {
        // Redirect back to the read.php page after successful deletion
        header("Location: read.php");
        exit();
    } else {
        echo "Error deleting flight: " . $con->error;
    }
} else {
    echo "No flight ID provided.";
}

$con->close();
?>

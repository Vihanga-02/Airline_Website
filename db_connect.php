<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default is blank for XAMPP
$dbname = "FLYHIGH";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
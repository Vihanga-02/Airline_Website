<?php
include('db_connect.php'); // Make sure this file connects to your database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_passport = $_POST['ID/Passport'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $message = $_POST['message'];

    // Prepare and bind the SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, id_passport, country, city, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $id_passport, $country, $city, $message);

    // Execute and check for success
    if ($stmt->execute()) {
        echo "<script>alert('Your response has been submitted successfully!'); window.location.href = 'contact us 1.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
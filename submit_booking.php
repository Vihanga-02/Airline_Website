<?php
// Include your database connection file
include('sconfig.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $passenger_name = $_POST['passenger_name'];
    $seat_type = $_POST['seat_type'];
    $meal_type = $_POST['meal_type'];
    $luggage_weight = $_POST['luggage_weight'];
    $schedule_ID = $_POST['schedule_ID']; // Get the schedule ID from the previous page

    // SQL query to insert the booking into the booking table
    $sql = "INSERT INTO bookings (passenger_name, seat_type, meal_type, luggage_weight, schedule_ID)
            VALUES ('$passenger_name', '$seat_type', '$meal_type', '$luggage_weight', '$schedule_ID')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the Payment.php page after successful insertion
        header("Location: Payment.php");
        exit(); // Always exit after a header redirect to avoid further code execution
    // Redirect to a confirmation page if necessary
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    // Close the connection
    $conn->close();
}
?>

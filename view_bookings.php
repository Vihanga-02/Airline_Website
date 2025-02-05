<?php
// Include your database connection file
include('sconfig.php');

// SQL query to retrieve all bookings
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Start HTML output
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking List</title>
        <link rel="stylesheet" href="css/view_booking.css"> <!-- Link to your CSS file for styling -->
    </head>
    <body>
        <!-- Horizontal Header Section -->
<header class="header">
        <div class="logo-container">
            <img src="images/logo.gif" alt="company logo" class="logo">
        </div>
        <nav class="nav-links">
            <ul>
                <li><a href="staff_dashboard.php">Dashboard</a></li>
                <li><a href="read.php">Flight Details</a></li>
                <li><a href="flight_schedule.php">Flight Schedules</a></li>
                <li><a href="view_bookings.php">Bookings</a></li>
                <li><a href="faq_list.php">FAQ</a></li>
                <li><a href="view_contacts.php">Feedbacks</a></li>
                <li><a href="passengers.php">Passengers</a></li>
                <li><a href="view_staff.php">Staff Management</a></li>
            </ul>
        </nav>
        <div class="logout-section">
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
    </header><br><br><br><br><br>
        <h1>Booking List</h1><br><br>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Passenger Name</th>
                <th>Seat Type</th>
                <th>Meal Code</th>
                <th>Luggage Code</th>
                <th>Schedule ID</th>
            </tr>';
    // Fetch and display each row
    while ($row = $result->fetch_assoc()) {
        // Format the booking_ID as B001, B002, etc.
        $formatted_id = "B" . str_pad($row['booking_ID'], 3, '0', STR_PAD_LEFT);

        echo '<tr>
                <td>' . $formatted_id . '</td>
                <td>' . $row['passenger_name'] . '</td>
                <td>' . $row['seat_type'] . '</td>
                <td>' . $row['meal_type'] . '</td>
                <td>' . $row['luggage_weight'] . '</td>
                <td>' . $row['schedule_ID'] . '</td>
              </tr>';
    }

    echo '</table> <br><br><br><br>
    <div style="background-color: #0b002e; color: white; text-align: center; padding: 10px 0; position: fixed; bottom: 0; width: 100%;font-size: 20px;">
        © 2024 FlyHigh Airline. All rights reserved.
    </div>
            <script>
        function logout() {
            // Add logout functionality here
            window.location.href = "login.php";
        }
    </script>
          </body>
          </html>';
} else {
    echo '<h2>No bookings found</h2>';
}

// Close the connection
$conn->close();
?>

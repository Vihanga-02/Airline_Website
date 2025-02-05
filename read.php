<?php

    require 'config.php';

    $sql="SELECT flight_id,plane_name,airline,capacity,description FROM flight";

    $result=$con->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>manage flights</title>
    <link rel="stylesheet" href="css/read.css">
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
    </header>
    <div class="container"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h2>Current Flights</h2>
        <a href="add_flight.php" class="add-flight-button">Add New Flight</a>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Flight ID</th><th>Flight Name</th><th>Airline</th><th>Capacity</th><th>Description</th><th></th><th></td></tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["flight_id"] . "</td>"; 
                echo "<td>" . $row["plane_name"] . "</td>";
                echo "<td>" . $row["airline"] . "</td>";
                echo "<td>" . $row["capacity"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td><a href='update_flight.php?id=" . $row["flight_id"] . "' class='update-flight-button'>Update</a></td>
                <td><a href='delete_flight.php?id=" . $row["flight_id"] . "' class='remove-flight-button' onclick='return confirm(\"Are you sure you want to delete this flight?\")'>Remove</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No flights available at the moment.</p>";
        }
        $con->close();
        ?><br><br><br>
    </div>
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
</html>
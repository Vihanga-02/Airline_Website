<!--Vihanga Edirisinghe IT23668690-->
<?php
// Start the session
session_start();

// Check if the staff is logged in, if not, redirect to the login page
if (!isset($_SESSION['staff_id'])) {
    header('Location: staff_login.php');
    exit();
}

// Fetch staff name from session
$staff_name = isset($_SESSION['staff_name']) ? $_SESSION['staff_name'] : 'Staff';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="css/staff_dashboard.css">
</head>
<body>

    <div class="sidebar">
        <div class="profile-section">
            <p>Welcome, <span id="staff-name"><?php echo $staff_name; ?></span></p>
        </div>
        <ul class="nav-links">
            <li><a href="read.php">Flight Details</a></li>
            <li><a href="flight_schedule.php">Flight Schedules</a></li>
            <li><a href="view_bookings.php">Bookings</a></li>
            <li><a href="faq_list.php">FAQ</a></li>
            <li><a href="view_contacts.php">Feedbacks</a></li>
            <li><a href="passengers.php">Passengers</a></li> <!-- Updated Passengers link -->
            <li><a href="view_staff.php">Staff Management</a></li>
        </ul>
        <div class="logout-section">
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
    </div>

    <div class="content">
    <h1>Staff Dashboard</h1><br>
    <p>Welcome to the FlyHigh Airlines staff portal, your hub for managing flight operations and ensuring seamless travel experiences for passengers worldwide. From updating flight schedules to managing bookings, this dashboard empowers you to keep everything running smoothly. Stay ahead with real-time data, handle passenger queries efficiently, and make sure our fleet is ready for takeoff. Your expertise helps FlyHigh soar above the clouds!</p>

    <img src="images/Vimage31.jpg" alt="Staff Dashboard Overview" style="display: block; margin: 20px auto; max-width: 100%; height: 70vh;">
</div>

    <script src="js/dashboard.js"></script>
    
</body>
</html>
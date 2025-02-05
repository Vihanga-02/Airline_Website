<!--Vihanga Edirisinghe IT23668690-->
<?php
session_start();
include('db_connect.php');

// Check if staff is logged in
if (!isset($_SESSION['staff_id'])) {
    header('Location: staff_login.php');
    exit();
}

// Handle delete user action
if (isset($_GET['delete_user_id'])) {
    $delete_user_id = $_GET['delete_user_id'];
    
    // Prepare delete query
    $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $delete_user_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }
    $stmt->close();
}

// Fetch all users
$stmt = $conn->prepare("SELECT user_id, first_name, last_name, email, contact_number FROM users");
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passengers</title>
    <link rel="stylesheet" href="css/passengers.css"> <!-- Updated CSS file -->
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

    <div class="dashboard-container">
        <h2>Passengers List</h2>

        <table class="passenger-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
        <!-- Format the user ID with 'PS' prefix and padded with zeros -->
        <?php $formatted_id = "PS" . str_pad($row['user_id'], 3, '0', STR_PAD_LEFT); ?>
        <td><?php echo $formatted_id; ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['last_name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['contact_number']; ?></td>
        <td>
            <a href="view_user.php?user_id=<?php echo $row['user_id']; ?>" class="view-btn">View</a>
            <a href="passengers.php?delete_user_id=<?php echo $row['user_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>
            </tbody>
        </table>
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
<?php
$stmt->close();
$conn->close();
?>
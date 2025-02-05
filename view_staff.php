<!--Vihanga Edirisinghe IT23668690-->
<?php
include('db_connect.php');

// Check if the database connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all staff details from the database
$sql = "SELECT * FROM staff_details";
$result = $conn->query($sql);

// Debugging: Check if the query failed
if (!$result) {
    die("Error executing query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff</title>
    <!-- Link to External CSS -->
    <link rel="stylesheet" href="css/view_staff.css">
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
    <!-- Staff Table Content -->
    <div class="table-container">
        <h2>Staff Members</h2>
        
        <!-- Add New Staff Member Button -->
        <a href="add_staff.php" class="add-button">Add New Staff Member</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any results
                if ($result->num_rows > 0) {
                    // Loop through the rows and display the data
                    while ($row = $result->fetch_assoc()) {
                        $formatted_id = "ST" . str_pad($row['staff_id'], 3, '0', STR_PAD_LEFT);
                        echo "<tr>
                                <td>" . htmlspecialchars($formatted_id) . "</td>
                                <td>" . htmlspecialchars($row['username']) . "</td>
                                <td>" . htmlspecialchars($row['role']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td class='action-buttons'>
                                    <a href='update_staff.php?id=" . htmlspecialchars($row['staff_id']) . "' class='edit-btn'>Edit</a> |
                                    <a href='delete_staff.php?id=" . htmlspecialchars($row['staff_id']) . "' class='delete-btn'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    // No staff members found
                    echo "<tr><td colspan='5'>No staff members found</td></tr>";
                }
                ?>
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
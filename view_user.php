<!--Vihanga Edirisinghe IT23668690-->
<?php
session_start();
include('db_connect.php');

// Check if staff is logged in
if (!isset($_SESSION['staff_id'])) {
    header('Location: staff_login.php');
    exit();
}

// Fetch user details based on user_id
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $stmt = $conn->prepare("SELECT first_name, last_name, email, contact_number, passport_id, address_no, city, state, dob FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($firstName, $lastName, $email, $contactNo, $passport, $address_no, $city, $state, $dob); // Added dob
    $stmt->fetch();
} else {
    header('Location: passengers.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Details</title>
    <link rel="stylesheet" href="css/view_user.css"> <!-- Separate CSS for user details -->
</head>
<body>
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
    <?php include 'staffheader.php'; ?><br><br><br><br>

    <div class="dashboard-container">
        <h2>User Details</h2>
        <div class="user-details">
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($firstName); ?></p>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($lastName); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($dob); ?></p> <!-- Display DOB after Email -->
            <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($contactNo); ?></p>
            <p><strong>Passport ID:</strong> <?php echo htmlspecialchars($passport); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($address_no . ', ' . $city . ', ' . $state); ?></p>
        </div>
        <a href="passengers.php" class="back-btn">Back to Passengers</a>
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
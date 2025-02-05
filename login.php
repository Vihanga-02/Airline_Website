<?php
// Start a session
session_start();

// Include the database connection
include('db_connect.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to find the user
    $stmt = $conn->prepare("SELECT user_id, first_name, password FROM users WHERE email = ?"); // Added user_id
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user with this email exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $firstName, $storedPassword); // Added userId
        $stmt->fetch();

        // Verify the password
        if ($password === $storedPassword) { // No password hashing as per your request
            // Set session variables for logged-in user
            $_SESSION['user_id'] = $userId; // Set user ID
            $_SESSION['first_name'] = $firstName;
            $_SESSION['email'] = $email;

            // Redirect to the homepage or dashboard
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            // Invalid password
            echo "<script>alert('Incorrect password!'); window.location.href = 'login.php';</script>";
        }
    } else {
        // No user found with the provided email
        echo "<script>alert('No user found with this email!'); window.location.href = 'login.php';</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head> 

<body>
    <?php include 'guestheader.php'; ?>
    <br><br><br><br><br>
    <div class="container">
        <h1>Login</h1>
        
        <form id="logInForm" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button id="log" type="submit">Login</button>
            <button id="staffLogin" type="button" onclick="window.location.href='staff_login.php';">Login as Staff</button>
            <p id="error-message"></p>
        </form>
    </div>
    <br>
    
    <?php include 'guestfooter.php'; ?>
</body>
</html>
<!--Vihanga Edirisinghe IT23668690-->
<?php
session_start();
include('db_connect.php');  // Make sure this file is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debug: Check if form data is being received
    echo 'Form submitted: ' . $username . ' / ' . $password;

    // Fetch user from the database
    $stmt = $conn->prepare("SELECT * FROM staff_details WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if user exists and if the password matches
    if ($user && $password === $user['password']) {  // Ensure strict comparison
        // Store user session
        $_SESSION['staff_id'] = $user['staff_id'];   // Assuming staff_id field exists
        $_SESSION['staff_name'] = $user['username']; // Assuming username is the staff name

        // Redirect to staff dashboard
        header('Location: staff_dashboard.php');
        exit();
    } else {
        echo "<script>alert('Invalid username or password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link rel="stylesheet" href="css/staff_login.css">
</head>
<body>  
<?php include 'guestheader.php'; ?> <br><br><br><br><br><br><br><br><br>
<div class = "login-body">
    <div class="login-container">
        <h2>Staff Login</h2>
        <form action="staff_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" id="login">Login</button>
            <button type="button" id="passengerLogin" onclick="window.location.href='login.php';">Login as Passenger</button>
        </form>
    </div>
</div><br><br><br>
<?php include 'guestfooter.php';?>
</body>
</html>
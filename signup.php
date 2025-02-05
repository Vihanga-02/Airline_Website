<?php
// Start a session
session_start();

// Include the database connection
include('db_connect.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contactNo = $_POST['contactNo'];
    $passport = $_POST['passport'];
    $address_no = $_POST['address_no'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if password and confirm password match
    if ($password != $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.location.href = 'signup.php';</script>";
        exit();
    }

    // Prepare and bind the SQL query
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, dob, gender, contact_number, passport_id, address_no, city, state, email, password) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $firstName, $lastName, $dob, $gender, $contactNo, $passport, $address_no, $city, $state, $email, $password);

    // Execute the query
    if ($stmt->execute()) {
        // Set session variable and redirect to login page
        $_SESSION['first_name'] = $firstName;
        echo "<script>alert('Sign up successful!'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error signing up! Please try again.'); window.location.href = 'signup.php';</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <?php include 'guestheader.php'; ?>
    <br><br><br><br><br>
    <div class="signup-container">
        <h2>Sign Up for FlyHigh Airlines</h2><br>
        <form id="signupForm" method="POST" action="signup.php">
            <div class="form-container">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
            </div>
            <div class="form-container">
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" max="2006-10-01" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label><br>
                    <div class="radio-group">
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" required>
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender" value="other" required>
                        <label for="other">Other</label>
                    </div>
                </div>
            </div>
            <div class="form-container">
                <div class="form-group">
                    <label for="contactNo">Contact Number</label>
                    <input type="text" id="contactNo" name="contactNo" required>
                </div>
                <div class="form-group">
                    <label for="passport">Passport ID</label>
                    <input type="text" id="passport" name="passport" required>
                </div>
            </div>
            <div class="form-container">
                <div class="form-group">
                    <label for="address_no">Address No.</label>
                    <input type="text" id="address_no" name="address_no" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div class="button-group">
                <button id="sign" type="submit">Sign Up</button>
                <button id="rest" type="reset">Reset</button>
            </div>
        </form>
        <p id="message"></p>
    </div>
    <?php include 'guestfooter.php'; ?>
    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        event.preventDefault(); // Prevent form submission
    }
    });
    </script>
</body>
</html>
<?php
session_start();
include('db_connect.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get the logged-in user's data
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
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

        // Update user details
        $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, dob = ?, gender = ?, contact_number = ?, passport_id = ?, address_no = ?, city = ?, state = ?, email = ? WHERE user_id = ?");
        $stmt->bind_param("ssssssssssi", $firstName, $lastName, $dob, $gender, $contactNo, $passport, $address_no, $city, $state, $email, $user_id);

        if ($stmt->execute()) {
            echo "<script>alert('Profile updated successfully!'); window.location.href='index.php';</script>";
            exit(); // Make sure to exit after redirecting
        } else {
            echo "<script>alert('Error updating profile.');</script>";
        }
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        // Delete account
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            session_destroy();
            echo "<script>alert('Account deleted successfully.'); window.location.href='login.php';</script>";  // Redirect to login page after account deletion
        } else {
            echo "<script>alert('Error deleting account.');</script>";
        }
        $stmt->close();
    }
}

// Fetch user details
$stmt = $conn->prepare("SELECT first_name, last_name, dob, gender, contact_number, passport_id, address_no, city, state, email FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($firstName, $lastName, $dob, $gender, $contactNo, $passport, $address_no, $city, $state, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php include 'guestheader.php'; ?> <br><br><br><br>
    <div class="profile-container">
        <h2>Update Profile</h2>
        <form method="POST">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Female</option>
                    <option value="other" <?php if($gender == 'other') echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contactNo">Contact Number</label>
                <input type="text" id="contactNo" name="contactNo" value="<?php echo htmlspecialchars($contactNo); ?>" required>
            </div>
            <div class="form-group">
                <label for="passport">Passport ID</label>
                <input type="text" id="passport" name="passport" value="<?php echo htmlspecialchars($passport); ?>" required>
            </div>
            <div class="form-group">
                <label for="address_no">Address No</label>
                <input type="text" id="address_no" name="address_no" value="<?php echo htmlspecialchars($address_no); ?>" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($city); ?>" required>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" value="<?php echo htmlspecialchars($state); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="button-group">
                <button type="submit" name="update" class="update-btn">Update Profile</button>
                <button type="submit" name="delete" class="delete-btn" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
            </div>
        </form>
    </div><br><br>
    <?php include 'guestfooter.php'; ?>
</body>
</html>
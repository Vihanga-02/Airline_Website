<!--Vihanga Edirisinghe IT23668690-->
<?php
include('db_connect.php');

// Check if the staff ID is set in the URL
if (isset($_GET['id'])) {
    $staff_id = $_GET['id'];
    
    // get staff details for the given staff_id
    $sql = "SELECT * FROM staff_details WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $staff = $result->fetch_assoc();

    // Check if staff exists
    if (!$staff) {
        die("Staff member not found!");
    }
} else {
    die("Invalid staff ID!");
}

// Process the form submission for updating staff details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update staff details in the database
    $sql = "UPDATE staff_details SET username = ?, role = ?, email = ?, password = ? WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $username, $role, $email, $password, $staff_id);

    // Check if the update was successful
    if ($stmt->execute()) {
        echo "<script>alert('Staff member updated successfully!'); window.location.href = 'view_staff.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Staff</title>
    <link rel="stylesheet" href="css/update_staff.css">
</head>
<body>
    <div class="form-container">
        <h2>Update Staff Member</h2>
        
        <!-- Staff Update Form -->
        <form action="" method="POST">
            <input type="hidden" name="staff_id" value="<?php echo htmlspecialchars($staff['staff_id']); ?>">
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($staff['username']); ?>" required>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($staff['role']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($staff['email']); ?>" required>
            
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="<?php echo htmlspecialchars($staff['password']); ?>" required>
            <br><br>
            <input type="submit" value="Update Staff">
        </form>
    </div>
</body>
</html>
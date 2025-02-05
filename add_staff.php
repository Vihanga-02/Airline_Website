<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password =$_POST['password'];

    // Insert new staff member
    $sql = "INSERT INTO staff_details (username, role, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $role, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('New staff member added successfully!'); window.location.href = 'view_staff.php';</script>";
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
    <title>Add New Staff</title>
    <link rel="stylesheet" href="css/add_staff.css">
</head>
<body>
    <div class="form-container">
        <h2>Add New Staff Member</h2>
        <form action="add_staff.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Add Staff</button>
        </form>
    </div>
</body>
</html>
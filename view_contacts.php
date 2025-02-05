<?php
include('db_connect.php'); // Make sure this file connects to your database

// Delete the record if a delete request is made
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Prepare and execute the delete query
    $stmt = $conn->prepare("DELETE FROM contact_submissions WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully!'); window.location.href = 'view_contacts.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

// Fetch all records
$result = $conn->query("SELECT * FROM contact_submissions");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback Submissions</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}
body{
    margin: 0;
    background-image: url("Images/Vimage30.jpg");
    background-size: cover;
    background-position: center;
    background-repeat:no-repeat;
    background-attachment: fixed;
    background-color: rgba(0, 0, 0, 0.2);
}
        .logo-container{
    /* inline-level container, meaning it flows like inline content 
   (i.e., doesn't start on a new line) but can have width and height like a block-level element.*/
   display: inline-block; 
}
.logo-container .logo{
    padding-left: 30px;
   max-width: 100px;
   height: 50px;
}
.header {
    background-color: #0f044c;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.nav-links ul {
    list-style-type: none;
    display: flex;
}

.nav-links ul li {
    margin-right: 20px;
}

.nav-links ul li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    padding: 10px 15px;
}

.nav-links ul li a:hover {
    background-color: #575757;
    border-radius: 5px;
}

.logout-section {
    margin-right:20px;
    padding-right: 10px;
}

.logout-btn {
    background-color: #d9534f;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.logout-btn:hover {
    background-color: #c9302c;
}
h1{
    text-align:center;
}
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        td{
            background-color:rgb(232, 229, 229);
        }

        .delete-btn {
            color: white;
            background-color: red;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
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
    </header><br><br><br><br><br><br>
    <h1>Feedback Submissions</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>ID/Passport</th>
                <th>Country</th>
                <th>City</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['id_passport']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td><a href="view_contacts.php?delete_id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    // Close the database connection
    $conn->close();
    ?>
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
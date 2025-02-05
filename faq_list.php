<?php
    include('configd.php'); // Connect to the database

    // Fetch FAQs to display in the table
    $query = "SELECT * FROM faq_table";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FAQ Management</title>
        <link rel="stylesheet" href="css/faq_styles.css">

        <script>
            function delete_faq(faq_ID) {
                if (confirm('Are you sure you want to delete this FAQ?')) {
                    window.location.href = 'delete_faq.php?id=' + faq_ID;
                }
            }
        </script>
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
    <br><br><br><br>
        <h2>Manage FAQs</h2>

        <!-- Table to display FAQs -->
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>FAQ Category</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['faq_category']; ?></td>
                        <td><?php echo $row['faq_question']; ?></td>
                        <td><?php echo $row['faq_answer']; ?></td>
                        <td>
                            <!-- Update button -->
                            <button onclick="window.location.href = 'update_faq.php?id=<?php echo $row['faq_ID']; ?>'">
                                Update
                            </button>
                            
                            <!-- Delete button with JavaScript confirmation -->
                            <button onclick="delete_faq('<?php echo $row['faq_ID']; ?>')">
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Create button below the table -->
        <br>
        <a href="create_faq.php">
            <center><button type="button">Create New FAQ</button></center>
        </a>
        <br><br><br><br>

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
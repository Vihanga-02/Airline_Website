<?php
    include('sconfig.php'); //connect to the data base

    //fetch flight schedules to display in the table
    $query = "SELECT * FROM flight_schedule";
    $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Flight Schedules Management</title>
        <link rel="stylesheet" href="css/styles.css">
        <script>
            function delete_schedule(schedule_ID)
            {
                if(confirm('Are you sure you want to delete this schedule?'))
                {
                    window.location.href = 'delete_schedule.php?id='+ schedule_ID;
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
    </header><br><br><br><br><br>
        
        <h2>Manage Flight Schedules</h2>
        <!--Create button top of the the table-->
        <br>
        <a href="create_schedule.php">
            <center><button type="button">Create New Flight Schedule</button></center>
        </a>
        <br>

        <!--Table to display flight schedules-->
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Schedule ID</th>
                    <th>Flight Name</th>
                    <th>Departure Date</th>
                    <th>Departure Time</th>
                    <th>Departure Country</th>
                    <th>Arrival Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td> <?php echo $row['schedule_ID'];?> </td>
                            <td> <?php echo $row['flight_name'];?> </td>
                            <td> <?php echo $row['departure_date'];?> </td>
                            <td> <?php echo $row['departure_time'];?> </td>
                            <td> <?php echo $row['departure_country'];?> </td>
                            <td> <?php echo $row['arrival_country'];?> </td>
                            <td>
                                
                                <!-- Update button -->
                                <button onclick="window.location.href = 'update_schedule.php?id=<?php echo $row['schedule_ID']; ?>'">
                                    Update
                                </button>
                                
                                <!-- Delete button with JavaScript confirmation -->
                                <button onclick = "delete_schedule('<?php echo $row['schedule_ID'];?>')">
                                    Delete
                                </button>
                            </td>
                        </tr>

                    <?php } ?>
            </tbody>
        </table>

        
        <br><br><br>
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
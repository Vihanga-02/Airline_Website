<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search_flights.css">
    <title>Search Flights</title>
</head>
<body>
    <?php include 'guestheader.php'; ?><br><br><br><br><br><br>

    <div class="content-wrapper">
        <?php
        // Get the inputs from the form
        $departure_country = 'Sri Lanka'; // Hardcoded departure country
        $arrival_country = $_POST['arrival_place'];
        $departure_date = $_POST['departure_date'];

        // Debug: Check if the form values are posted correctly (for debugging, remove comments if needed)
        //echo "Arrival Country: $arrival_country <br>";
        //echo "Departure Date: $departure_date <br>";

        // Connect to the database
        include('sconfig.php');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get the available flights
        $sql = "SELECT * FROM flight_schedule WHERE arrival_country='$arrival_country' AND departure_date='$departure_date'";
        $result = $conn->query($sql);

        // Check if flights are available
        if ($result->num_rows > 0) {
            echo "<h2>Available Flights</h2>";
            echo "<div class='flight-list'>";
            while($row = $result->fetch_assoc()) {
                echo "<div class='flight-item'>";
                echo "<p><strong>Flight Name:</strong> " . $row['flight_name'] . "</p>";
                echo "<p><strong>Departure Time:</strong> " . $row['departure_time'] . "</p>";
                echo "<form method='POST' action='passenger_information.php'>";
                echo "<input type='hidden' name='schedule_ID' value='" . $row['schedule_ID'] . "'>";
                echo "<button type='submit' class='book-button'>Select Flight</button>";
                echo "</form>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p class='error'>No flights available for the selected date.</p>";
        }

        // Close the connection
        $conn->close();
        ?>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <?php include 'guestfooter.php'; ?>
</body>
</html>
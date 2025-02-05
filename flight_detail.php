<?php

    require 'config.php'; //connecting the database

    $sql="SELECT flight_id,plane_name,airline,capacity,description FROM flight"; //reading data from the

    $result=$con->query($sql);
?>
    <html>
<head>
    <title>Available Flights</title>
    <link rel="stylesheet" href="css/flight_detail.css"> 
</head>
<body>
<?php include 'guestheader.php'; ?><br><br><br><br><br><br><br><br><br>
<div class = "new">
    <div class="container">
        <h2>Available Flights</h2>
        <div class="flight-container">

        <?php
            if ($result ->num_rows >0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='flight'>";
                   // echo "<h3>Flight ID: " . $row["flight_id"] . "</h3>";
                    echo "<p><strong>Flight Name:</strong> " . $row["plane_name"] . "</p>";
                    echo "<p><strong>Airline:</strong> " . $row["airline"] . "</p>";
                    echo "<p><strong>Capacity:</strong> " . $row["capacity"] . "</p>";
                    echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No flights available at the moment.</p>";
            }
            $con->close();
            ?>
        </div>
    </div>
    </div><br><br>
    <?php include 'guestfooter.php'; ?>
</body>
</html>
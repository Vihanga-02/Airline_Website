<?php
    include('sconfig.php');

    if ($_SERVER['REQUEST_METHOD']==='POST')
    {
        $flight_name = $_POST['flight_name'];
        $departure_date = $_POST['departure_date'];
        $departure_time = $_POST['departure_time'];
        $departure_country = $_POST['departure_country'];
        $arrival_country = $_POST['arrival_country'];   
        
        //Insert the new schedule
        $query = "INSERT INTO flight_schedule (flight_name,departure_date,departure_time,departure_country,arrival_country)
                  VALUES ('$flight_name','$departure_date','$departure_time','$departure_country','$arrival_country')";
        if (mysqli_query($conn,$query))
        {
            header("Location: flight_schedule.php");  //Redirect to the dashboard after successful insertion
        }
        else
        {
            echo "Error: ".$query."<br>".mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Create Flight Schedule</title>
        <link rel="stylesheet" href="css/create_styles2.css">
    </head>    
    <body>

        <h2>Update Flight Schedule</h2>
        
        <!--Form to create a new schedule-->
        <form action="create_schedule.php" method="POST">
            <label for = "flight_name">Flight Name:</label>
            <input type = "text" name = "flight_name" required>
            <br>

            <label for = "departure_date">Departure Date:</label>
            <input type = "date" name = "departure_date" required>
            <br>

            <label for = "departure_time">Departure Time:</label>
            <input type = "time" name = "departure_time" required>
            <br>

            <label for = "departure_country">Departure Country:</label>
            <input type = "text" name = "departure_country" required>
            <br>

            <label for = "arrival_country">Arrival Country:</label>
            <input type = "text" name = "arrival_country" required>
            <br>

            <input type = "submit" value = "Create Schedule">
            <br>
        </form>
    
    </body>
</html>
<?php
    include('sconfig.php');

    // Check if the schedule ID is provided
    if(isset($_GET['id']))
    {
        $schedule_ID = $_GET['id'];

        //Fetch existing data from the schedule
        $query = "SELECT * FROM flight_schedule WHERE schedule_ID = '$schedule_ID'";
        $result = mysqli_query($conn, $query);
        $schedule = mysqli_fetch_assoc($result);

        if ($_SERVER['REQUEST_METHOD']==='POST')
        {
            $flight_name = $_POST['flight_name'];
            $departure_date = $_POST['departure_date'];
            $departure_time = $_POST['departure_time'];
            $departure_country = $_POST['departure_country'];
            $arrival_country = $_POST['arrival_country'];

            //Update the schedule
            $query = "UPDATE flight_schedule SET 
                                            flight_name='$flight_name', 
                                            departure_date='$departure_date', 
                                            departure_time='$departure_time', 
                                            departure_country='$departure_country', 
                                            arrival_country='$arrival_country'
                      WHERE schedule_ID= '$schedule_ID'";

            if(mysqli_query($conn,$query))
            {
                header("Location: flight_schedule.php"); //Redirect to the dashboard after updates
                exit();
            }
            else
            {
                echo "Error: ".$query."<br>".mysqli_error($conn);
            }
        }
    }
    else
    {
        echo "Invalid schedule ID!";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Update Flight Schedule</title>
        <link rel="stylesheet" href="css/update_styles.css">
        
    <body>
        
        <h2>Update Flight Schedule</h2>

        <!--Form to update flight schedule-->
        <form action="update_schedule.php?id=<?php echo $schedule['schedule_ID']; ?>" method="POST">
            <label for = "flight_name">Flight Name:</label>
            <input type = "text" name = "flight_name" value="<?php echo $schedule['flight_name'];?>" required>
            <br>

            <label for = "departure_date">Departure Date:</label>
            <input type = "date" name = "departure_date" value="<?php echo $schedule['departure_date'];?>" required>
            <br>

            <label for = "departure_time">Departure Time:</label>
            <input type = "time" name = "departure_time" value="<?php echo $schedule['departure_time'];?>" required>
            <br>

            <label for = "departure_country">Departure Country:</label>
            <input type = "text" name = "departure_country" value="<?php echo $schedule['departure_country'];?>" required>
            <br>

            <label for = "arrival_country">Arrival Country:</label>
            <input type = "text" name = "arrival_country" value="<?php echo $schedule['arrival_country'];?>" required>
            <br>

            <input type = "submit" value = "Update Schedule">
            <br>
        </form>
    
    </body>
</html>
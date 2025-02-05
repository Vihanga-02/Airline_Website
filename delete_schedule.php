<?php
    include('sconfig.php'); //connect to the database

    //check if the schedule ID is provided in the URL

if (isset($_GET['id']))
{
    $schedule_ID = $_GET['id'];

    //Delete the schedule from the database
    $query = "DELETE FROM flight_schedule WHERE schedule_ID = '$schedule_ID'";

    if (mysqli_query($conn,$query))
    {
        
        header("Location: flight_schedule.php?message=Schedule+deleted+successfully!"); //Redirect to the dashboard
        exit();
    }
    else
    {
        echo "Error deleting schedule: ".mysqli_error($conn);
    }  
}
else
{
    header("Location: flight_schedule.php?error=No+schedule+ID+provided.");
    exit();
}

//close the database connection
mysqli_close($conn);

?>
<?php
require 'config.php';

if (isset($_GET['id'])) {
    $flight_id = $_GET['id'];

    // Fetch current flight details from the database
    $sql = "SELECT * FROM flight WHERE flight_id = '$flight_id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $flight = $result->fetch_assoc();
    } else {
        echo "No flight found.";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Flight</title>
    <link rel="stylesheet" href="css/add-flight.css">
</head>
<body>
    <div class="container">
        <h2>Update Flight</h2>
        <form method="post" action="update_flight.php">
            <input type="hidden" name="flight_id" value="<?php echo $flight['flight_id']; ?>">
            <div class="form_input">
                <label>Flight Name</label>
                <input type="text" name="flight_name" value="<?php echo $flight['plane_name']; ?>" required>
            </div>
            <div class="form_input">
                <label>Airline</label>
                <input type="text" name="airline" value="<?php echo $flight['airline']; ?>" required>
            </div>
            <div class="form_input">
                <label>Capacity</label>
                <input type="text" name="capacity" value="<?php echo $flight['capacity']; ?>" required>
            </div>
            <div class="form_input">
                <label>Description</label>
                <input type="text" name="description" value="<?php echo $flight['description']; ?>" required>
            </div>
            <div class="submit_form">
                <input type="submit" name="update" value="Update Flight" class="update-button">
                <!-- Back Button -->
                <a href="read.php" class="back-button">Back</a>
            </div>       
        </form>
    </div>
</body>
</html>

<?php
require 'config.php';

if (isset($_POST['update'])) {
    $flight_id = $_POST['flight_id'];
    $flight_name = $_POST['flight_name'];
    $airline = $_POST['airline'];
    $capacity = $_POST['capacity'];
    $description = $_POST['description'];

    // Update the flight details in the database
    $sql = "UPDATE flight SET plane_name = '$flight_name', airline = '$airline', capacity = '$capacity', description = '$description' WHERE flight_id = '$flight_id'";

    if ($con->query($sql) === TRUE) {
        // Redirect back to the read.php page after successful update
        header("Location: read.php");
        exit();
    } else {
        echo "Error updating flight: " . $con->error;
    }
}

$con->close();
?>

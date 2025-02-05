<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Flight</title>
    <link rel="stylesheet" href="css/add-flight.css">
</head>
<body>
    <div class="container">
        <h2>Add New Flight</h2>
        <form method="post" action="insert.php">
    <div class="form_input">
        <label>Flight Name</label>
        <input type="text" id="flight-name" name="flight-name" required>
    </div>
    <div class="form_input">
        <label>Airline</label>
        <input type="text" id="Airline" name="Airline" required>
    </div>
    <div class="form_input">
        <label>Capacity</label>
        <input type="text" id="Capacity" name="Capacity" required>
    </div>
    <div class="form_input">
        <label>Description</label>
        <input type="text" id="Description" name="Description" required>
    </div>
    <div class="submit_form">
        <input type="submit" id="submit" value="Submit">
    </div>
</form>
    </div>
</body>
</html>
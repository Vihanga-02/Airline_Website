<!DOCTYPE html>
<html>
<head>
    <title>Passenger Information</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-image: url("images/PassengerBack.jpeg");
            background-color: rgba(0, 0, 0, 0.6);
            background-blend-mode: overlay;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        form {
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.793);
        }

        h2 {
            text-align: center;
            color:#0F044C;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #0f044c;
        }

        #btn {
            width: 100%;
            padding: 10px;
            background-color:#164a81;;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        #btn:hover {
            background-color: #0F044C;
            transform: scale(1.02);
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

    </style>
</head>
<body>
<?php include 'guestheader.php'; ?><br><br><br><br><br><br><br><br>
    <form id="passengerForm" method="post" action="submit_booking.php">
        <h2>Passenger Information</h2>

        <div id="error-message" class="error"></div>

        <label for="passenger_name">Passenger Name:</label>
        <input type="text" id="passenger_name" name="passenger_name" required>

        <label for="passportID">Passport ID:</label>
        <input type="text" id="PID" name="PID" required>

        <label for="seat_type">Seat Type:</label>
        <select id="seat_type" name="seat_type" required>
            <option value="">Select Seat Type</option>
            <option value="Economy">Economy</option>
            <option value="Business">Business</option>
        </select>

        <label for="meal_type">Meal Code:</label>
        <select id="meal_type" name="meal_type" required>
            <option value="">--Select Meal--</option>
            <option value="VGML">Meal Type 01</option>
            <option value="NFML">Meal Type 02</option>
            <option value="GFML">Meal Type 03</option>
            <option value="LCML">Meal Type 04</option>
            <option value="05ML">Meal Type 05</option>
            <option value="06ML">Meal Type 06</option>
            <option value="07ML">Meal Type 07</option>
            <option value="08ML">Meal Type 08</option>
            <option value="09ML">Meal Type 09</option>
        </select>

        <label for="luggage_weight">Luggage Code:</label>
        <select id="luggage_weight" name="luggage_weight" required>
            <option value="">Select Luggage</option>
            <option value="7kg">7 kg</option>
            <option value="14kg">14 kg</option>
            <option value="20kg">20 kg</option>
            <option value="30kg">30 kg</option>
        </select>

        <!-- Hidden field to store the schedule ID from the previous page -->
    <input type="hidden" name="schedule_ID" value="<?php echo $_POST['schedule_ID']; ?>">

        <button id="btn" type="submit">Submit</button>
    </form><br><br>

    <script>
        document.getElementById('passengerForm').addEventListener('submit', function(event) {
            var errorMessage = '';
            var passportID = document.getElementById('PID').value.trim();

            if (passportID === '' || passportID.length < 6) {
                errorMessage += 'Valid Passport ID is required (at least 6 characters).<br>';
            }
            if (errorMessage !== '') {
                event.preventDefault();  // Prevent form submission
                document.getElementById('error-message').innerHTML = errorMessage;
            } else {
                document.getElementById('error-message').innerHTML = '';
            }
        });
    </script>
    <?php include 'guestfooter.php'; ?>
</body>
</html>

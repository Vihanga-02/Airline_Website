<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/booking.css">
    <title>Flight Booking Form</title>
</head>
<body>
<?php include 'guestheader.php'; ?><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class = "book-body">
    <div class="booking-container">
        <h1>Book Your Flight</h1>
        <form id="flight-booking-form" action="search_flights.php" method="POST">
            <!-- Group "From" and "To" together -->
            <div class="input-row">
                <div class="input-group">
                    <label for="departure_place">From</label>
                    <input type="text" id="departure_place" name="departure_place" value="Sri Lanka" readonly>
                </div>
                <div class="input-group">
                    <label for="arrival_place">To</label>
                    <select id="arrival_place" name="arrival_place">
                        <option value="India">India</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Singapore">Singapore</option>
                    </select>
                </div>
            </div>
            
            <!-- Group "Departure" and "Return" together -->
            <div class="input-row">
                <div class="input-group">
                    <label for="departure_date">Departure</label>
                    <input type="date" id="departure_date" name="departure_date">
                </div>
                <div class="input-group">
                    <label for="return_date">Return</label>
                    <input type="date" id="return_date" name="return_date">
                </div>
            </div>
            <button type="submit" id="search-flights">Search Flights</button>
            <script>
                document.getElementById('search-flights').addEventListener('click', function() {
                 var departure = document.getElementById('departure_place').value;
                 var arrival = document.getElementById('arrival_place').value;
                 var departureDate = document.getElementById('departure_date').value;
                 var returnDate = document.getElementById('return_date').value;

                 if (departure && arrival && departureDate && passengers) {
                     alert(`Searching flights from ${departure_place} to ${arrival_place}\nDeparture: ${departure_Date}\nReturn: ${return_Date ? return_Date : "No return"}\nPassengers: ${passengers}`);
                } else {
                        event.preventDefault();
                        alert('Please fill in all required fields.');
                       }
                    });
            </script>
        </form>
    </div>
    </div><br><br><br><br><br><br><br><br><br>
    <?php include 'guestfooter.php'; ?>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Airline Ticket Payment</title>
    <link rel="stylesheet" href="css/sPaymentStyles3.css">
</head>
<body style="background-image: url('images/background3.jpg');">
<?php include 'guestheader.php'; ?> <br><br><br><br>

<!-- JavaScript Logic to calculate bill based on selected options -->
<script>
    // Assuming you're getting this data from the previous page (passenger_information)
    const seat_type = "<?php echo $_POST['seat_type']; ?>";
    const meal_type = "<?php echo $_POST['meal_type']; ?>";
    const luggage_weight = "<?php echo $_POST['luggage_weight']; ?>";

    // Prices for seat types
    const seat_prices = {
        "Economy": 100000.00,
        "Business": 200000.00
    };

    // Prices for meal types
    const meal_prices = {
        "VGML": 1000.00, // Meal Type 01
        "NFML": 1100.00, // Meal Type 02
        "GFML": 1200.00, // Meal Type 03
        "LCML": 1300.00, // Meal Type 04
        "05ML": 1400.00, // Meal Type 05
        "06ML": 1500.00, // Meal Type 06
        "07ML": 1600.00, // Meal Type 07
        "08ML": 1700.00, // Meal Type 08
        "09ML": 1800.00  // Meal Type 09
    };

    // Prices for luggage weights
    const luggage_prices = {
        "7kg": 2000.00,
        "14kg": 4000.00,
        "20kg": 6000.00,
        "30kg": 8000.00
    };

    // Get the prices based on the selected values
    const seat_amount = seat_prices[seat_type] || 0;
    const meal_amount = meal_prices[meal_type] || 0;
    const luggage_amount = luggage_prices[luggage_weight] || 0;

    // Calculate the total amount
    const total_amount = seat_amount + meal_amount + luggage_amount;

    
    // Display the amounts in the bill section
    document.getElementById('sseatAmount').innerText = seat_amount.toFixed(2);
    document.getElementById('smealAmount').innerText = meal_amount.toFixed(2);
    document.getElementById('sextraLuggageAmount').innerText = luggageAmount.toFixed(2);
    document.getElementById('stotalAmount').innerText = luggage_amount.toFixed(2);

    // Set the total amount in the payment form field
    document.getElementById('stotAmount').value = total_amount.toFixed(2);
    
</script>

<div class="scontainer">

    <!--Bill Amount Container-->
    <div class="sbill-container">
        <form>
            <h2>Bill Amount</h2>
            <p>Seat: <strong id="sseatAmount"><br><br>Rs.100000.00</strong></p>
            <br>
            <p>Meal Package: <strong id="smealAmount"><br><br>Rs.1200.00</strong></p>
            <br>
            <p>Extra Luggae(If Applicable): <strong id="sextraLuggageAmount"><br><br>Rs.4000.00</strong></p>
            <br><br>
            <p><b>Total Amount to be paid:</b> <strong id="stotalAmount"><br><br><b>Rs.105200.00</b></strong></p>
        </form>
    </div>

    <!--Payment Container-->
    <div class="spayment-container">
        <h2>Payment Form</h2>
        <form id="spaymentForm">

            <div class="form-group">
                <label for="sfirstName">First Name</label>
                <input type="text" id="sfirstName" name="sfirstName" placeholder="First name" required>
            </div>
            <div class="form-group">
                <label for="slastName">Last Name</label>
                <input type="text" id="slastName" name="slastName" placeholder="Last name" required>
            </div>
            <div class="form-group">
                <label for="scardNumber">Card Number</label>
                <input type="text" id="scardNumber" name="scardNumber" placeholder="XXXX XXXX XXXX XXXX" maxlength="16" required>
            </div>
            <div class="form-group">
                <label for="sexpiryDate">Expiry Date</label>
                <input type="text" id="sexpiryDate" name="sexpiryDate" placeholder="MM/YY" required>
            </div>
            <div class="form-group">
                <label for="scvv">CVV</label>
                <input type="text" id="scvv" name="scvv" placeholder="XXX" maxlength="3" required>
            </div>
            <div class="form-group">
                <label for="stotAmount">Total Amount</label>
                <input type="text" id="stotAmount" name="stotAmount" placeholder="Total Amount" required>
            </div>
            <button type="submit" id = "payment-btn">
                Submit Payment
            </button>
        </form>
    </div>
</div> <br><br><br>


<script>
        // Inline JavaScript for handling form submission
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('spaymentForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Display success message
                alert("Booking successful! Thank you for your payment.");

                // Redirect to the home page after payment submission
                window.location.href = 'index.php';
            });
        });
    </script>

<?php include 'guestfooter.php'; ?>
</body>
</html>
  

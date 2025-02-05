<!--Vihanga Edirisinghe IT23668690-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FlyHigh Airline</title>
        <link rel="stylesheet" href="css/index.css">
        <script src="js/index.js"></script>
    </head>
    <body>
      <?php include 'guestheader.php'; ?>
      
        <!--Hero section-->
        <section id="home" class="hero-section">
            <div class="hero-content">
                <h1>Welcome to FlyHigh Airline</h1>
                <h5>Your journey begins with us</h5><br>
                
                <!-- Conditional Book Now button -->
                <?php if (isset($_SESSION['first_name'])): ?>
                    <!-- If logged in, direct to booking page -->
                    <a href="booking.php">
                        <button class="book-btn">Book Now</button>
                    </a>
                <?php else: ?>
                    <!-- If not logged in, direct to login page -->
                    <a href="login.php">
                        <button class="book-btn">Book Now</button>
                    </a>
                <?php endif; ?>

                <br><br><br><br><br><br>
                <p> 
                    Experience the skies like never before with FlyHigh Airline. 
                    Discover seamless bookings, exceptional services, and unforgettable journeys.
                </p>
                <p>Your adventure begins with us. Fly high, travel smart, and explore more!
                </p>
            </div>
        </section>

        <!--New and offers section-->
        <section class="highlights-section">
            <h1>News and Offers</h1>
            <div class="highlights-container">
                <div class="highlight-card">
                    <img src="images/Vimage7.jpg" alt="Lounge Pass" class="highlight-image">
                    <h3>Fly Direct to Maleshiya - Now Available!</h3>
                    <p>Explore the vibrant city of Maleshiya with FlyHigh's new non-stop flights. 
                        Starting this fall, we're adding Maleshiya to our list of direct destinations.
                    </p>
                </div>
                <div class="highlight-card">
                    <img src="images/Vimage6.jpg" alt="Student Perks" class="highlight-image">
                    <h3>Fly with exclusive perks as a student</h3>
                    <p>Travel smart with up to 50kg of checked baggage, exclusive discounts, and more.</p>
                </div>
                <div class="highlight-card">
                    <img src="images/Vimage8.jpg" alt="Miles Deals" class="highlight-image">
                    <h3>Save 20% on Early Bird Bookings!</h3>
                    <p>Plan your next adventure with FlyHigh and enjoy a 20% discount on flights booked 60 days in advance. 
                    Don't miss this opportunity to save big on your next vacation!</p>
                </div>
            </div>
        </section>
        
        <?php include 'guestfooter.php'; ?>
    </body>
</html>
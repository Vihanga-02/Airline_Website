<?php 
session_start(); // Ensure session is started
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlyHigh Airline</title>
    <link rel="stylesheet" href="css/guestfooter.css">
</head>
<body>
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>FlyHigh</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if (isset($_SESSION['first_name'])): ?>
                        <li><a href="booking.php">Plan and Book</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="luggages 1.php">Luggage Facilities</a></li>
                        <li><a href="meal 1.php">Pre-Order Meals</a></li>
                        <li><a href="flight_detail.php">Our Flights</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Plan and Book</a></li>
                        <li><a href="login.php">Services</a></li>
                        <li><a href="login.php">Luggage Facilities</a></li>
                        <li><a href="login.php">Pre-Order Meals</a></li>
                        <li><a href="login.php">Our Flights</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="footer-column">
                <h3>About and Policies</h3>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="privacyPolicy.php">Legal and Privacy</a></li>
                    <li><a href="terms_conditions.php">Terms & Conditions</a></li>
                    <li><a href="RefundPolicy.php">Refund Policies</a></li>
                    <li><a href="#">Cookies Settings</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Help and Support</h3>
                <ul>
                    <li><a href="faq_display.php">FAQs</a></li>
                    <?php if (isset($_SESSION['first_name'])): ?>
                        <li><a href="contact us 1.php">Contact Us</a></li>
                        <li><a href="contact us 1.php">Chat Support</a></li>
                        <li><a href="contact us 1.php">Feedback</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Contact Us</a></li>
                        <li><a href="login.php">Chat Support</a></li>
                        <li><a href="login.php">Feedback</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!--Footer social media connect-->
        <div class="footer-social">
            <h4>Connect with us</h4>
        </div>  
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank"><img src="images/fb.png"></a>
            <a href="https://www.instagram.com" target="_blank"><img src="images/inster.png"></a>
            <a href="https://www.youtube.com" target="_blank"><img src="images/youtube.png"></a>
            <a href="https://www.twitter.com" target="_blank"><img src="images/twitter.png"></a>
            <a href="https://www.linkedin.com" target="_blank"><img src="images/linkein.png"></a>
        </div>

        <div class="footer-copyright">
            <p>&copy; 2024 FlyHigh Airline. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
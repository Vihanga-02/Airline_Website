<!--Vihanga Edirisinghe IT23668690-->
<!--Header section-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FlyHigh Airline</title>
        <link rel="stylesheet" href="css/guestheader.css">
    </head>
    <body>
    <?php
session_start(); // Ensure session is started to check logged-in status
?>

<header>
    <nav>
        <div class="logo-container">
            <img src="images/logo.gif" alt="company logo" class="logo">
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            
            <?php if (isset($_SESSION['first_name'])): ?>
                <!-- Links for registered users -->
                <li><a href="booking.php">Plan & Book</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact us 1.php">Contact Us</a></li>
            <?php else: ?>
                <!-- Redirect to login page for unregistered users -->
                <li><a href="login.php">Plan & Book</a></li>
                <li><a href="login.php">Services</a></li>
                <li><a href="login.php">Contact Us</a></li>
            <?php endif; ?>

            <li><a href="about.php">About Us</a></li>
        </ul>

        <div class="login-buttons">
            <?php if (isset($_SESSION['first_name'])): ?>
                <!-- Display this part if the user is logged in -->
                <a href="profile.php">
                    <button class="profile">Hello, <?php echo $_SESSION['first_name']; ?></button>
                </a>
                <a href="logout.php">
                    <button class="logout">Log Out</button>
                </a>
            <?php else: ?>
                <!-- Display this part if the user is NOT logged in -->
                <a href="login.php">
                    <button class="login">Login</button>
                </a>
                <a href="signup.php">
                    <button class="Signup">Sign Up</button>
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>
</body>
<html>
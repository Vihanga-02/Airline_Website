<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Flight - Contact Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url("./images/dimage20.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-blend-mode: overlay;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin-left: 15px;
            
        }

        .form-box {
            background-color: rgba(255, 255, 255, 0.7); /* Transparent background */
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
            margin-top: 20px;
            margin-bottom: 20px;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #000257;
            text-align: center;
            margin-bottom: 20px;
            font-size: 32px;
            padding-top: 15px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            color: #3f3f3f;
            font-size: 14px;
        }

        label {
            display: block;
            align-items: left;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        form {
            padding-left: 20px;
            display: flex;
            flex-direction: column;
            align-items: left; /* Align the button and inputs to the center */
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 90%;
            padding: 12px;
            margin-bottom: 20px;
            margin-right: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: rgba(255, 255, 255, 0.8); /* Slightly opaque input background */
        }

        textarea {
            height: 80px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            width: 100%; /* Ensure the container fills the form width */
            padding-bottom: 20px;
        }

        #sbtbtn {
            width: 50%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: 2px solid #007bff;
            border-radius: 5px;
            align-items: center;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Button shadow */
        }

        #sbtbtn:disabled {
            background-color: #007bff;
            cursor: not-allowed;
            opacity: 0.6;
        }

       

        .privacy-policy {
            font-size: 12px;
            color: #333;
        }

        .privacy-policy a {
            color: #007bff;
        }
    </style>
    <script>
        function enableButton() {
            const checkbox = document.getElementById("chkbx");
            const submitButton = document.getElementById("sbtbtn");

            if (checkbox.checked) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        function submitForm() {
            const name = document.getElementById("name").value;
            alert("Your response has been submitted. Thanks " + name + " for joining Fly High Airlines!");
            return false;
        }
    </script>
</head>

<body>

    <?php include 'guestheader.php'; ?>
    <br><br><br> <br><br><br><br><br><br>
    <div class="container">
        <div class="form-box">
            <h1>Contact Us</h1>
            <p>24-hour contact center (Colombo) <br>
                Telephone: +947154334786 <br>
                Fax: +942345679566 <br>
                Email: contactUs@flyhigh.com
            </p>

            <form action="submit_contact.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>

                <label for="ID/Passport">*ID/Passport:</label>
                <input type="text" id="id_passport" name="ID/Passport" placeholder="Your ID or Passport No." required>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country" placeholder="Your Country" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" placeholder="Your City" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" placeholder="Your Message"></textarea>

                <div>
                    <input type="checkbox" id="chkbx" name="enable" onclick="enableButton()">
                    <label for="chkbx" class="privacy-policy">Accept <a href="#">privacy policy</a> & terms</label>
                </div>

                <div class="button-container">
                    <button type="submit" id="sbtbtn" name="submit" disabled>Submit</button>
                </div>
            </form>
        </div>
    </div><br><br><br>
    <?php include 'guestfooter.php'; ?>
</body>

</html>


<?php
require 'configd.php'; // Assuming this file contains the database connection $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faq_category = $_POST['faq_category'];
    $faq_question = $_POST['faq_question'];
    $faq_answer = $_POST['faq_answer'];

    // Prepare the SQL query
    $sql = "INSERT INTO faq_table (faq_category, faq_question, faq_answer) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);


    // Check if the prepare() method was successful
    
    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error); // Output the database error
    }

    // Bind parameters
    $stmt->bind_param("sss", $faq_category, $faq_question, $faq_answer);

    // Execute and check for success
    if ($stmt->execute()) {
        header("Location: faq_list.php"); // Redirect to the FAQ list after successful insertion
        exit();
    } else {
        echo "Error: Unable to create FAQ. Please try again later.";
    }

    $stmt->close(); // Close statement
}
?>


<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create FAQ</title>
    <link rel="stylesheet" href="css/create_styles.css">

</head>
<body>

<h2>Create FAQ</h2>

<!-- Form to create a new FAQ -->
<form action="create_faq.php" method="POST">
    <label for="faq_category">FAQ Category:</label>
    <input type="text" name="faq_category" required>
    <br>

    <label for="faq_question">FAQ Question:</label>
    <textarea name="faq_question" required></textarea>
    <br>

    <label for="faq_answer">FAQ Answer:</label>
    <textarea name="faq_answer" required></textarea>
    <br>

    <input type="submit" value="Create FAQ">
    <br>
</form>

</body>
</html>
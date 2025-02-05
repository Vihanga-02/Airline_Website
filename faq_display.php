<?php
include('configd.php'); // Connect to the database

// Fetch FAQs from the database
$query = "SELECT * FROM faq_table";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="css/faq_display.css"> <!-- Link to the external CSS -->
</head>
<body>
<?php include 'guestheader.php'; ?> <br><br><br><br><br><br><br><br><br>

<div class="container">
    <h2>Frequently Asked Questions</h2>
    <section>
        <?php while ($faq = mysqli_fetch_assoc($result)) { ?>
            <details>
                <summary><?php echo htmlspecialchars($faq['faq_question']); ?></summary>
                <p><?php echo htmlspecialchars($faq['faq_answer']); ?></p>
            </details>
        <?php } ?>
    </section>
</div><br><br><br>
<?php include 'guestfooter.php'; ?>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
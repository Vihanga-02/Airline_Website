<?php
include('configd.php');

// Check if the FAQ ID is provided
if (isset($_GET['id'])) {
    $faq_ID = $_GET['id'];

    // Fetch existing data from the FAQ
    $query = "SELECT * FROM faq_table WHERE faq_ID = '$faq_ID'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $faq = mysqli_fetch_assoc($result);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and prepare input data
            $faq_category = mysqli_real_escape_string($conn, $_POST['faq_category']);
            $faq_question = mysqli_real_escape_string($conn, $_POST['faq_question']);
            $faq_answer = mysqli_real_escape_string($conn, $_POST['faq_answer']);

            // Update the FAQ
            $query = "UPDATE faq_table SET 
                        faq_category='$faq_category', 
                        faq_question='$faq_question', 
                        faq_answer='$faq_answer' 
                      WHERE faq_ID = '$faq_ID'";

            if (mysqli_query($conn, $query)) {
                header("Location: faq_list.php"); // Redirect to the FAQ management page after updates
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo "No FAQ found with the provided ID!";
        exit();
    }
} else {
    echo "Invalid FAQ ID!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update FAQ</title>
    <link rel="stylesheet" href="css/update_styles.css">
</head>
<body>

<h2>Update FAQ</h2>

<!-- Form to update FAQ -->
<form action="update_faq.php?id=<?php echo $faq['faq_ID']; ?>" method="POST">
    <label for="faq_category">FAQ Category:</label>
    <input type="text" name="faq_category" value="<?php echo htmlspecialchars($faq['faq_category']); ?>" required>
    <br>

    <label for="faq_question">FAQ Question:</label>
    <input type="text" name="faq_question" value="<?php echo htmlspecialchars($faq['faq_question']); ?>" required>
    <br>

    <label for="faq_answer">FAQ Answer:</label>
    <textarea name="faq_answer" required><?php echo htmlspecialchars($faq['faq_answer']); ?></textarea>
    <br>

    <input type="submit" value="Update FAQ">
    <br>
</form>

</body>
</html>
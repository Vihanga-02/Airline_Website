<?php
include('configd.php'); // Connect to the database

// Check if the FAQ ID is provided in the URL
if (isset($_GET['id'])) {
    $faq_ID = $_GET['id'];

    // Delete the FAQ from the database
    $query = "DELETE FROM faq_table WHERE faq_ID = '$faq_ID'";

    if (mysqli_query($conn, $query)) {
        header("Location: faq_list.php?message=FAQ+deleted+successfully!"); // Redirect to the FAQ management page
        exit();
    } else {
        echo "Error deleting FAQ: " . mysqli_error($conn);
    }  
} else {
    header("Location: faq_list.php?error=No+FAQ+ID+provided.");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
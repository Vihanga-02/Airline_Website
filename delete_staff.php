<?php
include('db_connect.php');

if (isset($_GET['id'])) {
    $staff_id = $_GET['id'];

    // Delete staff member
    $sql = "DELETE FROM staff_details WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_id);

    if ($stmt->execute()) {
        echo "<script>alert('Staff member deleted successfully!'); window.location.href = 'view_staff.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
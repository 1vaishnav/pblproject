<?php
// approve.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve entry ID from the form
    $entry_id = $_POST['entry_id'];

    // Update the status to "approved" in the database
    include('connect.php');
    $stmt = $conn->prepare("UPDATE request SET status = 'approved' WHERE id = ?");
    $stmt->bind_param("i", $entry_id);
    $stmt->execute();
    // Redirect back to the admin panel after approval
    header("Location: index.php");
    exit();
}
?>

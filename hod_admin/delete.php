<?php
// delete.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve entry ID from the form
    $entry_id = $_POST['entry_id'];

    // Delete the entry from the database
    include('connect.php');
    $stmt = $conn->prepare("DELETE FROM request WHERE id = ?");
    $stmt->bind_param("i", $entry_id);
    $stmt->execute();

    // Redirect back to the admin panel after deletion
    header("Location: index.php");
    exit();
}
?>

<?php include('navbar.php'); ?>
<?php include('sidebar.php');?>
<?php
// view.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entry_id'])) {
    $entry_id = $_POST['entry_id'];

    // Create a connection to the database
    $conn = new mysqli('localhost', 'root', '', 'student');

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query to fetch the row
    $stmt = $conn->prepare("SELECT * FROM request WHERE id = ?");
    $stmt->bind_param("i", $entry_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the entry exists
    if ($result->num_rows > 0) {
        // Fetch the row as an associative array
        $row = $result->fetch_assoc();

        // Display the whole row
        
        echo "<table>";
        echo "<tr><td><strong>ID:</strong></td><td>" . htmlspecialchars($row['id']) . "</td></tr>";
        echo "<tr><td><strong>Institute/Office:</strong></td><td>" . htmlspecialchars($row['institute_office']) . "</td></tr>";
        echo "<tr><td><strong>Department:</strong></td><td>" . htmlspecialchars($row['department']) . "</td></tr>";
        echo "<tr><td><strong>Contact Name:</strong></td><td>" . htmlspecialchars($row['contact_name']) . "</td></tr>";
        echo "<tr><td><strong>Email:</strong></td><td>" . htmlspecialchars($row['email']) . "</td></tr>";
        echo "<tr><td><strong>Mobile No:</strong></td><td>" . htmlspecialchars($row['mobile_no']) . "</td></tr>";
        echo "<tr><td><strong>Repair Type:</strong></td><td>" . htmlspecialchars($row['repair_type']) . "</td></tr>";
        echo "<tr><td><strong>Repair Details:</strong></td><td>" . htmlspecialchars($row['repair_details']) . "</td></tr>";
        echo "<tr><td><strong>Status:</strong></td><td>" . htmlspecialchars($row['status']) . "</td></tr>";
        echo "</table>";
    } else {
        echo "No entry found with ID: " . htmlspecialchars($entry_id);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No ID provided.";
}
 include('footer.php');
?>


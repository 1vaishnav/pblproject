<?php
// connect to your database
$conn = new mysqli('hostname', 'username', 'password', 'student');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example of fetching pending form requests
$sql = "SELECT * FROM form_requests WHERE status = 'pending'";
$result = $conn->query($sql);

$requests = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }
} 

// Return JSON response
echo json_encode($requests);

// Close the connection
$conn->close();
?>

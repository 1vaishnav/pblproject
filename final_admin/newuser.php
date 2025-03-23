<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "student"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

    // Validate passwords
    if ($password !== $confirm_password) {
        echo '<script>alert("Passwords do not match."); window.location.href = "register.html";</script>';
        exit();
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT EmailID FROM users WHERE EmailID = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<script>alert("Email already exists. Please use a different email."); window.location.href = "register.html";</script>';
        $stmt->close();
        exit();
    }
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind for insertion
    $stmt = $conn->prepare("INSERT INTO users (EmailID, Password, first_name, last_name) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Create a username
    $username = strtolower($first_name) . '.' . strtolower($last_name);
    
    // Bind parameters
    $stmt->bind_param("ssss", $email, $first_name, $last_name, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>alert("Registration successful!"); window.location.href = "login.html";</script>';
    } else {
        echo '<script>alert("Error: ' . $stmt->error . '"); window.location.href = "register.html";</script>';
    }

    // Close statement and connection
    $stmt->close();
}

$conn->close();
?>

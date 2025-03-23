<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $institute_office = $_POST['institute_office'];
    $department = $_POST['department'];
    $contact_name = $_POST['contact_name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $repair_type = $_POST['repair_type'];
    $repair_details = $_POST['repair_details'];
    // Pending status
    $status = "pending";

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'student');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO request (institute_office, department, contact_name, email, mobile_no, repair_type, repair_details, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $institute_office, $department, $contact_name, $email, $mobile_no, $repair_type, $repair_details, $status);
        $stmt->execute();
        session_start();
        $_SESSION['success_message']='Form submitted successfully';

        header("Location: ../main_navbar.php");
        exit();
        ?>
    
        <?php
        exit(); // Ensure no other output is sent
        $stmt->close();
        $conn->close();
        
    }
}
?>

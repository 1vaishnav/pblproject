<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = htmlspecialchars($_POST['id']);
    $institute_office = htmlspecialchars($_POST['institute_office']);
    $department = htmlspecialchars($_POST['department']);
    $contact_name = htmlspecialchars($_POST['contact_name']);
    $user_email = htmlspecialchars($_POST['email']); // User email
    $assignee_email = htmlspecialchars($_POST['assignee_email']); // Assignee email
    $mobile_no = htmlspecialchars($_POST['mobile_no']);
    $repair_type = htmlspecialchars($_POST['repair_type']);
    $repair_details = htmlspecialchars($_POST['repair_details']);
    $status = htmlspecialchars($_POST['status']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to SMTP::DEBUG_SERVER for debugging
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ahirevaishu03@gmail.com'; // Replace with your email
        $mail->Password   = 'oxnwauutzdhndbyg'; // Replace with your password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('your_email@gmail.com', 'Repair Requests');
        $mail->addAddress($assignee_email, $contact_name); // Add assignee's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Repair Request Details';
        $mail->Body    = "
            <h1>Repair Request Details</h1>
            <p><strong>ID:</strong> $id</p>
            <p><strong>Institute/Office:</strong> $institute_office</p>
            <p><strong>Department:</strong> $department</p>
            <p><strong>Contact Name:</strong> $contact_name</p>
            <p><strong>Email:</strong> $user_email</p>
            <p><strong>Mobile No:</strong> $mobile_no</p>
            <p><strong>Repair Type:</strong> $repair_type</p>
            <p><strong>Repair Details:</strong> $repair_details</p>
            <p><strong>Status:</strong> $status</p>
        ";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>

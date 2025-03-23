<?php

//cheking the password and user name from the login page and open the data.php file
include("connect.php");

if (isset($_POST['submit'])) {
    $admin_name = filter_input(INPUT_POST, 'EmailID', FILTER_SANITIZE_STRING);
    $admin_password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);

    if ($admin_name && $admin_password) {
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE EmailID = ? AND Password = ?");
        $stmt->bind_param("ss", $admin_name, $admin_password);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;

        if ($count == 1) {
            // Redirect to data.php upon successful login
            header("Location: index.php");
            exit(); // Ensure no other output is sent
        } else {
            echo '<script>
                alert("Login failed. Invalid username or password.");
                window.location.href = "login.html"; // Redirect to login page
                </script>';
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo '<script>
            alert("Please enter both username and password.");
            window.location.href = "login.php"; // Redirect to login page
            </script>';
    }
}
?>


<?php
    session_start();
    if(isset($_SESSION['success_message'])){
       echo'<div class="success-message>'.$_SESSION['success_message'].'</div';
        unset($_SESSION['success_messgae']);
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Workshop</title>
  <link rel="stylesheet" href="s.css">
</head>
<body>
  <!-- Navigation Bar -->
  <header>
    <nav>
      <img src="kk-wagh-logo.png" alt="College Logo" class="college-logo">
      <ul>
        <li><a href="main.html">Home</a></li>
        <li>
          <a href="main.html">Menu</a>
          <ul class="dropdown">
            <li><a href="main.php">Home</a></li>
            <li><a href="#viewstatus">View Status</a></li>
            <li><a href="form/form.php">Request Form</a></li>
          </ul>
        </li>
        <li><a href="#loginas">Login as</a>
          <ul class="dropdown">
            <li><a href="hod_admin/login.html">AS HOD</a></li>
            <li><a href="final_admin/login.html">AS Workshop Admin</a></li>
          </ul>
        </li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

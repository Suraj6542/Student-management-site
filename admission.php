<?php
error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message'])
{
    $message=$_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}



?>
<!DOCTYPE html>
<html>
<head>
  <title>Admission</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h1>Student Management System</h1>
  </div>

  <div class="navbar">
    <a href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="admission.php">Admission</a>
    <a href="login.php">Login</a>
  </div>
 <center>
    <h1>Admission Form</h1>
 </center>
 <div align="center"  class="admission_form">
<form action="data_check.php" method="POST">
    <div class="adm_int">
        <label class="label_text">Name</label>
        <input class="input_deg" type="text" name="name">
    </div>
    <div class="adm_int">
        <label class="label_text">Email</label>
        <input class="input_deg" type="text" name="email">
    </div>
    <div class="adm_int">
        <label class="label_text">Phone</label>
        <input class="input_deg" type="text" name="phone">
    </div>
    <div class="adm_int">
        <label class="label_text">Message</label>
        <textarea class="input_txt" name="message"></textarea>
    </div>
    <div class="adm_int">
        <input class="submitbtn" id="submit" type="submit" value="Apply" name="apply">
    </div>
</form>
 </div>

</body>
</html>

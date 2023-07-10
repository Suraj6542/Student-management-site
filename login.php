<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body background="R.jpg" class="body_deg">
<div class="header">
    <h1>Student Management System</h1>
  </div>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="#contact">Contact</a>
    <a href="admission.php">Admission</a>
    <a href="login.php">Login</a>
  </div>
<center>
  <div  class="form_deg">
    <center class="title_deg">
        Login Form
        <h4>
            <?php
            error_reporting(0);
            session_start();
            session_destroy();
             echo $_SESSION['loginMessage'];
            ?>
        </h4>
    </center>
    <form action="login_check.php" method="POST" class="login_form">
        <div>
            <label class="label_deg">Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label class="label_deg">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" name="submit" value="Login" class="login-button">
        </div>
    </form>
  </div>
</center>    

</body>
</html>
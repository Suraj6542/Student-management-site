
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
else if($_SESSION['usertype']=='student')
{
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="smsdb";
$data=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['add_student']))
{
     $username=$_POST['name'];
     $user_email=$_POST['email'];
     $user_phone=$_POST['phone'];
     $user_password=$_POST['password'];
     $usertype="student";
    
     $check= "SELECT * FROM user WHERE username='$username' ";
     $check_user=mysqli_query($data,$check);
     $row_count=mysqli_num_rows($check_user);
     if($row_count==1)
     {
        echo "<script type='text/javascript'>
        alert('Username already exists, try another one');
         </script>";
     }
     else
     {

     


     $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES('$username',
     '$user_email','$user_phone','$usertype','$user_password')";

     $result=mysqli_query($data,$sql);
     if($result){
        echo "<script type='text/javascript'>
       alert('Data added successfully');
        </script>";
     }
     else{
        echo "upload failed";
     }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        label
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .add-student-button {
  background-color: #4CAF50; 
  color: white; 
  padding: 10px 20px; 
  font-size: 16px; 
  border: none; 
  cursor: pointer; 
  border-radius: 4px; 
}

.add-student-button:hover {
  background-color: #45a049; 
}
.div_deg{
    background-color: skyblue;
    width: 400px;
    padding-top: 70px;
    padding-bottom: 70px;
}
    </style>
</head>
<body>

<header class="header">
    <a href="">Admin Dashboard</a>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</header>

<aside>
<ul>
    <li>
        <a href="admision2.php">Admission</a>
    </li>
    <li>
        <a href="add_student.php">Add Student</a>
    </li>
    <li>
        <a href="view_student.php">View Student</a>
    </li>
    <li>
        <a href="admin_add_teacher.php">Add Teacher</a>
    </li>
    <li>
        <a href="admin_add_teacher.php">View Teacher</a>
    </li>
   
</ul>
</aside>


<div class="content">
<center>
<h1>Add student</h1>

<div class="div_deg">
    <form action="#" method="POST">
     <div>
        <label for="">Username</label>
        <input type="text" name="name">
     </div>
     <div>
        <label for="">Email</label>
        <input type="email" name="email">
     </div>

     <div>
        <label for="">Phone</label>
        <input type="number" name="phone">
     </div>

     <div>
        <label for="">Password</label>
        <input type="text" name="password">
     </div>

     <div>
       
        <input type="submit" name="add_student" value="Add Student" class="add-student-button">
     </div>



    </form>
</div>
</center>
</div>

</body>
</html>
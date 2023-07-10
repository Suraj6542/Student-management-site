
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

if(isset($_POST['add_teacher']))
{
     $t_name=$_POST['name'];
     $t_description=$_POST['description'];
     $file=$_FILES['image']['name'];
     $dst="./image/".$file;
     $dst_db="image/".$file;
     move_uploaded_file($_FILES['image']['tmp_name'],$dst);
     $sql="INSERT INTO teacher (name,description,image)
     VALUES ('$t_name','$t_description','$dst_db')";

     $result=mysqli_query($data,$sql);
      if($result){
        header('location:admin_add_teacher.php');
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
  .submitbtn {
    background-color: #08e6e9;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  .submitbtn:hover {
    background-color: #45a049;
  }
  .submitbtn:active {
    background-color: #3e8e41;
  }
  label{
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
  .div_deg{
    background-color: greenyellow;
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
        <a href="admin_view_teacher.php">View Teacher</a>
    </li>
  
</ul>
</aside>


<div class="content">
<center>
<h1>Add Teacher</h1>

<div class="div_deg">
    <form action="#" method="POST" enctype="multipart/form-data">
        <div>
            <label for="">Teacher Name:</label>
            <input type="text" name="name">
        </div>
        <br>
        <div>
            <label for="">Description:</label>
            <textarea name="description"></textarea>
        </div>
        <br>
        <div>
            <label for="">Image:</label>
            <input type="file" name="image">
        </div>
        <br>
        <div>
            <input type="Submit" name="add_teacher" value="Add Teacher" class="submitbtn">
        </div>
    </form>
</div>

</center>
</div>

</body>
</html>
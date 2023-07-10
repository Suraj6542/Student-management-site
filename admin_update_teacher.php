
<?php
session_start();
error_reporting(0);
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
if($_GET['teacher_id']){
    $t_id=$_GET['teacher_id'];
    $sql="SELECT * FROM teacher WHERE id='$t_id'";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
}
if(isset($_POST['update_teacher'])){
    $id=$_POST['id'];
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    if($file){
        $sql2="UPDATE teacher SET name='$t_name', description='$t_description',image='$dst_db' WHERE id='$id' ";
        $result2=mysqli_query($data,$sql2);
    }
    
    else{
        $sql2="UPDATE teacher SET name='$t_name', description='$t_description' WHERE id='$id' ";
        $result2=mysqli_query($data,$sql2);
    }
    if($result2){
        echo "update success";
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
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
.form_deg{
    background-color: aqua;
    width: 600px;
    padding-top: 70px;
    padding-bottom: 70px;
}
.submit {
            color: white;
   
   background-color: blue;
   padding: 6px;
   text-decoration: none;
}
.submit:hover{
   background-color: green;
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
<h1>Update Teacher Data</h1>
<form class="form_deg" action="admin_update_teacher.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="id" value="<?php 
    echo "{$info['id']}";
    ?>" hidden>
    <div>
    <label for="">Teacher Name</label>
    <input type="text" name="name" value="<?php 
    echo "{$info['name']}";
    ?>">
    </div>
    <div>
    <label for="">About Teacher</label>
    <textarea name="description" rows="4"><?php 
    echo "{$info['description']}";
    ?></textarea>
    </div>
    <div>
    <label for="">Teacher old Image</label>
    <img src="<?php 
    echo "{$info['image']}";
    ?>" alt="" width="100px" height="100px">
    </div>
    <div>
    <label for="">Choose Teacher new Image</label><br>
    <input type="file" name="image">
    </div>
    <div>
        <input class="submit" type="submit" name="update_teacher" >
    </div>
</form>
</center>
</div>

</body>
</html>
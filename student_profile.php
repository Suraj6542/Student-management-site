<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
else if($_SESSION['usertype']=='admin')
{
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="smsdb";


$data=mysqli_connect($host,$user,$password,$db);
$name=$_SESSION['username'];
$sql="SELECT * FROM user WHERE username='$name' ";
$result=mysqli_query($data,$sql);
$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile']))
{
  $s_email=$_POST['email'];
  $s_phone=$_POST['phone'];
  $s_password=$_POST['password'];

  $sql2="UPDATE user SET email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name'";
  $result2=mysqli_query($data,$sql2);
  if($result2)
  {
    header('location:student_profile.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
 label{
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
        }
        .update {
            color: white;
   float: ;
   background-color: blue;
   padding: 6px;
   text-decoration: none;
}
.update:hover{
   background-color: green;
}
    </style>
    <?php
include 'student_css.php' ;
?>
</head>
<body>

<?php
include 'student_sidebar.php' ;
?>
<div class="content">
<center>
    <h1>Update Profile</h1>
  <form action="#" method="POST">
<div class="div_deg">

<div >
    <label for="">Email</label>
    <input type="email" name="email" value="<?php
    echo "{$info['email']}";
    ?>">
</div>  
<div >  
    <label for="">Phone</label>
    <input type="number" name="phone" value="<?php
    echo "{$info['phone']}";
    ?>">
</div>
<div >
    <label for="">Password</label>
    <input type="text" name="password" value="<?php
    echo "{$info['password']}";
    ?>">
</div>
<div >
    <input type="submit" name="update_profile" class="update" value="Update">
</div>

</div>


  </form>
  </center>
</div>


</body>
</html>

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

$sql="SELECT * FROM teacher";
$result= mysqli_query($data,$sql);

if($_GET['teacher_id'])
{
    $t_id=$_GET['teacher_id'];
    $sql2="DELETE FROM teacher WHERE id='$t_id' ";
    $result2=mysqli_query($data,$sql2);
    if($result2)
    {
        header('location:admin_view_teacher.php');
        
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
        .table_th{
            padding: 20px ;
            font-size: 20px;
        }
        .table_td{
            padding: 20px;
            background-color: skyblue;
        }
        .update {
            color: white;
   float: right;
   background-color: blue;
   padding: 6px;
   text-decoration: none;
}
.update:hover{
   background-color: green;
}
.delete {
            color: white;
   float: right;
   background-color: red;
   padding: 6px;
   text-decoration: none;
}
.delete:hover{
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
<h1>View All Teacher Data</h1>
<table border="1px">
    <tr>
        <th class="table_th">Teacher Name</th>
        <th class="table_th">About Teacher</th>
        <th class="table_th">Image</th>
        <th class="table_th">Delete</th>
        <th class="table_th">Update</th>
    </tr>
    <?php
    while($info=$result->fetch_assoc())
    {
      
    
    ?>
    <tr>
        <td class="table_td">
            <?php
            echo "{$info['name']}";
            ?>
        </td>
        <td class="table_td">
        <?php
            echo "{$info['description']}";
            ?>
        </td>
        <td class="table_td">
        <img src="<?php
            echo "{$info['image']}";
            ?>" alt="" height="100px" width="100px">
        </td>
        <td class="table_td"> 
            <?php
            echo "
            <a class='delete' href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>";
            ?>
    </td>  
    <td  class="table_td">
        <?php
        echo "
      <a class='update' href='admin_update_teacher.php?teacher_id={$info['id']}' >Update</a>";
      ?>
    </td>
    </tr>
    <?php
    }
    ?>
</table>
</center>
</div>

</body>
</html>
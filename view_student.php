
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

$sql="SELECT * FROM user WHERE usertype='student'";
$result=mysqli_query($data,$sql);

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
            padding: 20px;
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
<h1>Student Data</h1>

<table border="1px">

    <tr>
        <th class="table_th">Username</th>
        <th class="table_th">Email</th>
        <th class="table_th">Phone</th>
        <th class="table_th">Password</th>
        <th class="table_th">Delete</th>
        <th class="table_th">Update</th>
    </tr>
    <?php
while($info=$result->fetch_assoc()){




    ?>
    <tr>
        <td class="table_td">
            <?php echo "{$info['username']}" ?>
        </td>
        <td class="table_td"> <?php echo "{$info['email']}" ?>
    </td>
        <td class="table_td"> <?php echo "{$info['phone']}" ?>
</td>
        <td class="table_td"> <?php echo "{$info['password']}" ?>
    </td>    

    <td class="table_td"> <?php echo "<a class='delete' onClick=\"javascript:return confirm('Are you sure to delete')\" href='delete.php?student_id={$info['id']}'> Delete </a>" ?>
    </td>  

    <td class="table_td"> <?php echo "<a class='update' href='update_student.php?student_id={$info['id']}'> Update </a>" ?>
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
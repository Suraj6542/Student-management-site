
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

$sql="SELECT * from admission";

$result=mysqli_query($data,$sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php
include 'admin_sidebar.php';

?>

<div class="content">
<center>
<h1>Applied for Admission</h1>
<table border="1px">
       <tr>
        <th style="padding:20px; font_size: 15px;">Name</th>
        <th style="padding:20px; font_size: 15px;">Email</th>
        <th style="padding:20px; font_size: 15px;">Phone</th>
        <th style="padding:20px; font_size: 15px;">Message</th>
        
       </tr>
       <?php
        while($info=$result->fetch_assoc())
       {
?>
       <tr>
        <td  style="padding:20px;">
        <?php
        echo "{$info['name']}";
         ?>
    </td>
        <td style="padding:20px;">
        <?php
        echo "{$info['email']}";
         ?>
    </td>
        <td style="padding:20px;"><?php
        echo "{$info['phone']}";
         ?></td>
        <td style="padding:20px;"><?php
        echo "{$info['message']}";
         ?></td>
        
       </tr>
       <?php
       }
       ?>

</table>
</center>
</div>

</body>
</html>
<?php
    session_start();
$username=$_POST['uname'];
$password=$_POST['psw'];
$connection=mysqli_connect("localhost","root","","student");
$sqlstmt="select * from users where username='$username'and password='$password'";
$query=mysqli_query($connection,$sqlstmt);
$row=mysqli_fetch_assoc($query);
$count=mysqli_num_rows($query);
echo $count;
if($count==1)
{
    $_SESSION['cname']=$row['Firstname'];
    $_SESSION['login']=$username;
    echo "<script>location.replace('user.php');</script>";
}
else
{
    header("location:index.php?error=Wrong password or username");
    echo "<script>location.replace('index.php?error=Wrong password or username');</script>";
}
?>